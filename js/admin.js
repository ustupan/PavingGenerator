$(document).ready(function(){
    $('.panel-header').html('SIGN IN');
});


function getUsers() {
    const apiUrl = "http://localhost:8080";
    const $list = $('.users-list');
    $.ajax({
        url : apiUrl + '/GeneratorKostki/?page=admin_users',
        dataType : 'json'
    }).done((res) => {
            $list.empty();
            res.forEach(el => {
                console.log(el.id);
                $list.append(`<tr>
                    <td>${el.login}</td>
                    <td>${el.email}</td>
                    <td>${el.role}</td>
                    <td>
                        <button class="btn btn-danger" type="button" onclick="deleteUser(${el.id})">
                            <i class="material-icons">delete</i>
                        </button>
                    </td>
                    </tr>`);
            })
        });
}

function deleteUser(id) {
    if (!confirm('Do you want to delete this user?')) {
        return;
    }

    const apiUrl = "http://localhost:8080";

    $.ajax({
        url : apiUrl + '/GeneratorKostki/?page=admin_delete_user',
        method : "POST",
        data : {
            id : id
        },
        success: function() {
            alert('Selected user successfully deleted from database!');
            getUsers();
        }
    });
}