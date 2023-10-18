<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

<script>

// оповещения
function alert(type,msg){
    let bs_class = (type == 'success') ? 'alert-success' : 'alert-danger';
    let element = document.createElement('div');
    element.innerHTML = `
            <div class="custom-alert ${bs_class} alert-dismissible fade show" role="alert">
            <strong class = "me-3">${msg}</strong>
            <button type = "button" onclick="this.parentNode.parentNode.remove()" class = "btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>`;
    document.body.append(element);
}

</script>