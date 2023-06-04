<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Review</title>
    <link rel="stylesheet" href="css/review.css">
    <style>
        label {
            margin-top: 10px;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .title {
            margin: 0;
        }

        .search-input {
            padding: 8px;
            border: none;
            border-radius: 4px;
            outline: none;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            flex-grow: 1;
            margin-left: 10px;
            max-width: 60%;
        }

        .search-input::placeholder {
            color: #999;
        }

        .container {
            max-height: 400px;
            overflow: auto;
        }
    </style>
</head>

<body>
    <?php
    include "navigasi.php";
    ?>
    <div class="container">
        <div class="header">
            <h2 class="title">Product Review</h2>
            <input type="text" id="searchInput" class="search-input" placeholder="Search by username or product name" onkeyup="loadReviewList(this.value)">
        </div>
        <div id="review-list">
            <!-- Review list will be displayed here dynamically -->
        </div>

    </div>
    <div>
        <?php
        if (isset($_SESSION['username'])) {
            echo '<button id="add-review-btn" onclick="showReviewForm()">Add Review</button>';
        }
        ?>
    </div>

    <!-- Review Form Popup -->
    <div id="review-form-popup" class="review-form-popup">
        <div class="review-form-container">
            <span class="close" onclick="closeReviewForm()">&times;</span>
            <h2>Add Review</h2>
            <form id="review-form" method="POST" enctype="multipart/form-data">
                <?php
                echo '<input type="hidden" id="username" name="username" value="' . $_SESSION['username'] . '">';
                ?>
                <label for="stars">Stars:</label>
                <select id="stars" name="stars" required>
                    <option value="1">1 Star</option>
                    <option value="2">2 Stars</option>
                    <option value="3">3 Stars</option>
                    <option value="4">4 Stars</option>
                    <option value="5">5 Stars</option>
                </select>
                <label for="category">Category:</label>
                <select id="category" name="category" required>
                    <option value="">- Select Category -</option>
                    <option value="Mouse">Mouse</option>
                    <option value="Keyboard">Keyboard</option>
                    <option value="Headset">Headset</option>
                    <option value="Mousepad">Mousepad</option>
                </select>


                <label for="product_name">Product Name:</label>
                <input type="text" id="product_name" name="product_name" placeholder="Enter product name" required>

                <div class="checkboxes">
                    <p>Options:</p>
                    <input type="checkbox" id="fast_delivery" name="options[]" value="Fast Delivery">
                    <label for="fast_delivery">Fast Delivery</label>
                    <input type="checkbox" id="good_service" name="options[]" value="Good Service">
                    <label for="good_service">Good Service</label>
                    <input type="checkbox" id="good_quality" name="options[]" value="Good Quality">
                    <label for="good_quality">Good Quality</label>
                </div>

                <label for="description">Description:</label>
                <textarea id="description" name="description" placeholder="Enter your review" required></textarea>

                <label for="image">Image:</label>
                <input type="file" id="image" name="image">

                <input type="submit" value="Submit">
            </form>
        </div>
    </div>
    <script src="js/review.js"></script>
</body>

</html>