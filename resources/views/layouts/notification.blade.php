@if (session('success'))
    <script>
        $(document).ready(function () {
            $.Notification.notify(
                'success',
                'top right',
                'Success',
                '{{ session('success') }}'
            );

            // Use setTimeout to remove the notification after 5 seconds
            setTimeout(function () {
                // Close or remove the notification with the custom class
                $(".notifyjs-corner").fadeOut(500, function () {
                    $(this).remove();
                });
            }, 10000); // 5 seconds
        });
    </script>
@endif

@if (session('error'))
    <script>
        $(document).ready(function () {
            // Show the notification with a custom class
            $.Notification.notify(
                'error',
                'top right',
                'Error Occurred!',
                '{{ session('error') }}'
            );

            // Use setTimeout to remove the notification after 5 seconds
            setTimeout(function () {
                // Close or remove the notification with the custom class
                $(".notifyjs-corner").fadeOut(500, function () {
                    $(this).remove();
                });
            },10000); // 5 seconds
        });
    </script>
@endif


@if (session('warning'))
    <script>
        $(document).ready(function () {
            $.Notification.notify(
                'error',
                'top right',
                'Error',
                '{{ session('warning') }}'
            );

            // Use setTimeout to remove the notification after 5 seconds
            setTimeout(function () {
                // Close or remove the notification with the custom class
                $(".notifyjs-corner").fadeOut(500, function () {
                    $(this).remove();
                });
            }, 10000); // 5 seconds
        });
    </script>
@endif
