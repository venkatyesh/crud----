function deleteEmployee(id){
    let conf = confirm("Are you sure you want to delete this?")
    if(conf){
        $.ajax({
            type: "delete",
            url: 'employee/' + id,
            success: function(resp){
                if(resp == "success"){
                    $('#emp-row-' + id).remove();
                } else {
                    alert("Can't delete")
                }
            }
        })
    }
}

function deleteUser(id){
    let conf = confirm("Are you sure you want to delete this?")
    if(conf){
        $.ajax({
            type: "delete",
            url: '/admin/user/' + id,
            success: function(resp){
                if(resp == "success"){
                    $('#user-row-' + id).remove();
                } else {
                    alert("Can't delete")
                }
            }
        })
    }
}
