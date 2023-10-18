<?php
    require('./db_config.php');   
    require('./essentials.php');  

    // проверка дат

        if(isset($_POST['check'])){
            $data = filteration($_POST);
            
            function getDatesFromRange($start, $end){
                $dates = array($start);
                while(end($dates) < $end){
                    $dates[] = date('Y-m-d', strtotime(end($dates).' +1 day'));
                }
                return $dates;
            }

            $u_exist = select("SELECT * FROM `booking` WHERE `room_id`=?",
            [$data['room']], "s");
            
            $number = $data['room'];
            
            $sel = "SELECT * FROM `booking` WHERE `room_id`= {$number}";
            $q = mysqli_query($con, $sel);
            
            
            $arr = []; 
            while ($row = mysqli_fetch_assoc($q)){                
                array_push($arr,getDatesFromRange($row['checkin'], $row['checkout']));
            }
            $dates = array_merge(...$arr);

            $in_date = new DateTime($data['checkin']);
            $out_date = new DateTime($data['checkout']);

            $room_inf = select("SELECT price FROM `rooms` WHERE `number`=?", [$data['room']], "s");
            $room_data = mysqli_fetch_assoc($room_inf);
            $room_price = intval($room_data['price']);
            
        
            if(mysqli_num_rows($u_exist)!=0){
                $dates1 = getDatesFromRange($data['checkin'], $data['checkout']);
                if ($data['checkin'] == $data['checkout'] OR $data['checkin'] >= $data['checkout'])
                {
                    echo 'uncorrect_dates';
                    exit;
                } else if (array_intersect($dates, $dates1)){
                    echo 'booked_already';
                    exit;
                }
            }
          
            $count_days = (date_diff($in_date,$out_date)->days)+1;
            $payment = $room_price * $count_days;
  
            $query = "INSERT INTO `booking`(`user`, `room_id`,`checkin`, `checkout`, `days`, `price`) 
            VALUES (?,?,?,?,?,?) ";
    
            $values = [$data['email'], $data['room'], $data['checkin'], $data['checkout'], $count_days, $payment];
            
            if(insert($query,$values,'ssssss')){
                echo 1;
            } else {
                echo 'email_missing';
            }
        }
?>