<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selectivity Multi-Select Example</title>
    <link rel="stylesheet" href="/vendors/css/bootstrap.min.css">
    <link rel="stylesheet" href="/vendors/selectivity-3.1.0/selectivity-jquery.css">
</head>
<body>
    <!-- Container for the multiple select input -->
    <div id="multipleSelect" class="col-2"></div>

    <!-- Load necessary scripts -->
    <script src="/vendors/js/jquery.min.js"></script>
    <script src="/vendors/selectivity-3.1.0/selectivity-jquery.min.js"></script>
    <script src="/vendors/js/popper.min.js"></script>
    <script src="/vendors/js/bootstrap.bundle.min.js"></script>
    
        <!-- Inline JavaScript for Selectivity initialization -->
        <script>
        $(document).ready(function () {
            // Ensure jQuery is loaded
            if (typeof $ === 'undefined') {
                console.error("jQuery not loaded.");
                return;
            }

            // Ensure Selectivity is loaded
            if (typeof $.fn.selectivity === 'undefined') {
                console.error("Selectivity not loaded.");
                return;
            }

            // Initialize Selectivity for the multipleSelect div
            $('#multipleSelect').selectivity({
                multiple: true,              // Enable multiple selection
                items: [                     // Define selectable items
                    "192.168.93.114:8181", 
                    "192.168.93.115:8181", 
                    "192.168.93.116:8181"
                ],
                placeholder: 'Choose servers', // Placeholder text for the input
                showDropdown: true           // Automatically show the dropdown
            });

            // Event handler for changes in selection
            $("#multipleSelect").on("change", function () {
                var selectedValues = $('#multipleSelect').selectivity("value");
                // Perform an action with selectedValues
                console.log("Selected servers:", selectedValues);
            });
        });
    </script>
</body>
</html>
