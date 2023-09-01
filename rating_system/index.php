<?php include "database/db.php"; ?>
<!DOCTYPE html>
<html>
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <link href='jquery-bar-rating-master/dist/themes/fontawesome-stars.css' rel='stylesheet' type='text/css'>
</head>
<body>
    <div class="content container mt-5">
       <?php include "show_star_ratings.php"; ?>
    </div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="jquery-bar-rating-master/dist/jquery.barrating.min.js"></script>
<!-- Invoke star rating -->
<script type='text/javascript'>
    $(document).ready(function(){
        $('#star_rating_<?php echo $product_id; ?>').barrating('set',<?php echo $rating; ?>);
    });
    $(function () {
        $('.rating').barrating({
            theme: 'fontawesome-stars',
            onSelect: function (value, text, event) {
                
                var el = this;
                var el_id = el.$elem.data('id');
                
                if (typeof (event) !== 'undefined') {
                    var split_id = el_id.split("_");
                    var product_id = split_id[1];
                    $.ajax({
                        url: './ajax_star_rating.php',
                        type: 'post',
                        data: {
                            product_id: product_id,
                            rating: value
                        },
                        dataType: 'json',
                        success: function (data) {
                            var average = data['numRating'];
                            $('#numeric_rating_' + product_id).text(average);
                        }
                    });
                }
            }
        });
    });
</script>
</html>