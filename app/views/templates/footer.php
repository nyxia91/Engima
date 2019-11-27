<script src="<?= JSURL ?>helper.js"></script>

<?php
if (isset($this->data['page_js'])) {
    echo '<script src="' . JSURL . $this->data['page_js'] . '.js"></script>';
}
?>

</body>
</html>