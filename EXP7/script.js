$(document).ready(function() {
    loadData();

    function loadData(search = "") {
        $.ajax({
            url: "fetch.php",
            type: "GET",
            data: { search: search },
            success: function(data) {
                $("#tableData").html(data);
            }
        });
    }

    // Insert Student (with phone)
    $("#addStudent").click(function() {
        let name = $("#name").val();
        let email = $("#email").val();
        let phone = $("#phone").val();
        if (name == "" || email == "" || phone == "") {
            alert("Please fill all fields");
            return;
        }
        $.ajax({
            url: "insert.php",
            type: "POST",
            data: { name: name, email: email, phone: phone },
            success: function(response) {
                if (response == "1") {
                    loadData();
                    $("#name").val("");
                    $("#email").val("");
                    $("#phone").val("");
                } else {
                    alert("Error saving data.");
                }
            }
        });
    });

    // Delete Student
    $(document).on("click", ".deleteBtn", function() {
        if (confirm("Are you sure you want to delete this student?")) {
            let id = $(this).data("id");
            $.ajax({
                url: "delete.php",
                type: "POST",
                data: { id: id },
                success: function() {
                    loadData();
                }
            });
        }
    });

    // Open Edit Modal (with phone)
    $(document).on("click", ".editBtn", function() {
        $("#editId").val($(this).data("id"));
        $("#editName").val($(this).data("name"));
        $("#editEmail").val($(this).data("email"));
        $("#editPhone").val($(this).data("phone"));
        $("#editModal").modal("show");
    });

    // Update Student (with phone)
    $("#updateStudent").click(function() {
        let id = $("#editId").val();
        let name = $("#editName").val();
        let email = $("#editEmail").val();
        let phone = $("#editPhone").val();
        $.ajax({
            url: "update.php",
            type: "POST",
            data: { id: id, name: name, email: email, phone: phone },
            success: function() {
                $("#editModal").modal("hide");
                loadData();
            }
        });
    });

    // Search Live
    $("#search").on("keyup", function() {
        loadData($(this).val());
    });
});