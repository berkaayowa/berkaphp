            <div class="alert alert-success success-alert hidden <?= (DEBUG == true) ? 'display_debug' : '' ?>" role="alert">
                <div class="heading">
                    <span data-close-message class="glyphicon glyphicon-remove-circle pull-right close-message" aria-hidden="true"></span>
                </div>
                <span id="message">
                    <?php
                        if(is_array($this->flash)) {
                            echo'<pre>';print_r($this->flash);
                        } else {
                            echo $this->flash;
                        }
                    ?>
                </span>
            </div>
        </div>

        </div>

    <script src="/Views/Admin/Layout/js/plugins/morris/raphael.min.js"></script>
    <script src="/Views/Admin/Layout/js/plugins/morris/morris.min.js"></script>
    <script src="/Views/Admin/Layout/js/plugins/morris/morris-data.js"></script>
    <script src="/Views/Admin/Layout/js/app.js"></script>

    <script>
       $app.initFlash();
//       $app.initHome();
    </script>

</body>
</html>
