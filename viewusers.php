<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user_management";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Pagination variables
$limit = 10; // Number of records per page
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $limit;

// SQL query to fetch users with pagination
$sql = "SELECT * FROM employees LIMIT $start, $limit";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="home.css">
    <title>View All Users</title>
    <style>
    .edit-btn {
        cursor: pointer;
        color: blue;
        text-align: center;
        font-size: 10px;
    }

    .delete-btn {
        cursor: pointer;
        color: red;
        text-align: center;
        font-size: 10px;
    }

    /* Style to position the edit button */
    .edit-btn-container,
    .delete-btn-container {
        text-align: right;
    }

    .edit-btn-container .edit-btn,
    .delete-btn-container .edit-btn {
        margin-left: 5px;
    }
    </style>
</head>

<body>
    <!--Navbar content-->
    <?php include 'navbar.php'?>

    <!--Footer content-->
    <?php include 'footer.php'?>


    <div class="heading">
        <h2>All Users Information</h2>
    </div>

    <table>
        <tbody>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Role</th>
                </tr>
            </thead>
        </tbody>

        <?php
        if ($result->num_rows > 0) {
            // Output data of each row
            while ($row = $result->fetch_assoc()) {
                echo "<tr><td>" . $row["id"] . "</td><td>" . $row["name"] . "</td><td>" . $row["email"] . "</td><td>" . $row["role"] . "</td></tr>";
                
                echo "<td class='edit-btn-container'><span class='edit-btn' data-id='" . $row["id"] . "'><i class='fas fa-edit'></i> Edit</span></td>";
                echo "</tr>";

                echo "<td class='delete-btn-container'><span class='delete-btn' data-id='" . $row["id"] . "'><i class='fas fa-trash-alt'></i> Delete</span></td>";
                echo "</tr>";

            }
                
            
            
        } else {
            echo "<tr><td colspan='4'>No users found</td></tr>";
        }
        ?>
        </tbody>
    </table>

    <?php
// Pagination
$sql = "SELECT COUNT(id) AS total FROM employees";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$total_pages = ceil($row["total"] / $limit);
?>
    <br>
    <div class="pagination-container">
        <?php
    for ($i = 1; $i <= $total_pages; $i++) {
        echo "<a href='?page=" . $i . "'>" . $i . "</a> ";
    }
    ?>
    </div>


    <script>
    // Add event listener for edit button clicks
    const editButtons = document.querySelectorAll('.edit-btn');
    editButtons.forEach(btn => {
        btn.addEventListener('click', function() {
            const userId = this.getAttribute('data-id');
            // Redirect to edit page or open a modal for editing
            window.location.href = 'edituser.php?id=' + userId;
        });
    });

    // Add event listener for delete button clicks
    document.querySelectorAll('.delete-btn').forEach(btn => {
        btn.addEventListener('click', function() {
            const userId = this.getAttribute('data-id');
            if (confirm("Are you sure you want to delete this user?")) {
                window.location.href = 'deleteuser.php?id=' + userId;
            }
        });
    });
    </script>


    <?php $conn->close(); ?>

</body>

</html>