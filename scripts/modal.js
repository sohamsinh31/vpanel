$(document).ready(function () {
    // Function to open the add form modal
    $('#add_data').click(function () {
        $("#mbody").html(add_form_data);
        $('#exampleModal').modal('toggle');
    });

    // Function to handle edit button click
    $(".edit-btn").click(function () {
        let user = $(this).data('user');
        let formHtml = '';

        for (const [key, value] of Object.entries(user)) {
            if (key !== 'id') { // Assuming 'id' is a non-editable field
                formHtml += `<div class="mb-3">
                                <label for="${key}" class="form-label">${key}</label>
                                <input type="text" class="form-control" id="${key}" name="${key}" value="${value}">
                             </div>`;
            }
        }

        $('#editForm').html(formHtml);
        $('#exampleModal').modal('show');
    });

    // Function to handle saving changes
    $('#saveChanges').click(function () {
        let userId = $('.edit-btn[data-user]').data('id');

        var unindexed_array = $('#editForm').serializeArray();
        var indexed_array = {};

        $.map(unindexed_array, function (n, i) {
            indexed_array[n['name']] = n['value'];
        });
        let json_data = JSON.stringify(indexed_array);
        // console.log(json_data);

        $.ajax({
            url: '/api/users', // Specify the path to your PHP script that handles the update
            type: 'PUT',
            headers: { "X-Authorization": "1234", "Content-Type": "application/json" },
            data: JSON.stringify({ id: userId, ...indexed_array }),
            success: function (response) {
                // Handle success, maybe show a success message and refresh the table
                // alert('User updated successfully!');
                // location.reload(); // Reload the page to reflect changes
                console.log(response)
            },
            error: function (xhr, status, error) {
                // Handle error
                console.log(error);
                alert('Error updating user.');
            }
        });
    });
});
