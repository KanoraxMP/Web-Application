<section>
    <?php if (isset($_SESSION['message'])): ?>
    <?= $_SESSION['message'] ?>
    <?php unset($_SESSION['message']); ?>
<?php endif; ?>
    <form action="courses" method="post" onsubmit="return confirmSubmission()">
        <label for="code">Course Code</label><br>
        <input type="text" name="code" id="code" /><br>
        <label for="name">Course Name</label><br>
        <input type="text" name="name" id="name" /><br>
        <label for="instructor">Instructor</label><br>
        <input type="text" name="instructor" id="instructor" /><br>
        <button type="submit">Submit</button>
    </form>
</section>
<script>
    function confirmSubmission() {
        return confirm("Are you sure you want to submit this form?");
    }
</script>
