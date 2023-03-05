<?php
$submitPressed = filter_input(INPUT_POST, 'btnSubmit');
if (isset($submitPressed)) {
  $name = filter_input(INPUT_POST, 'txtName');
  $link = mysqli_connect('localhost', 'root', 'jaeger12', 'pwl2022', '3306')
    or die(mysqli_connect_error());
  mysqli_autocommit($link, false);
  $query = "INSERT INTO book(name) VALUES(?)";
  if ($stmt = mysqli_prepare($link, $query)) {
    mysqli_stmt_bind_param($stmt, $name);
    mysqli_stmt_execute($stmt) or die(mysqli_error($link));
    mysqli_commit($link);
    mysqli_stmt_close($stmt);
  }
  mysqli_close($link);
}
?>
<form action="" method="post">
  <div>
    <label for="catId">Name</label>
    <input type="text" class="form-control" id="catId" name="txtName">
  </div>
  <input name="btnSubmit" type="submit" class="btn btn-default">
</form>
<table class="display" id="myTable">
  <thead>
    <tr>
      <th>isbn</th>
      <th>name</th>
      <th>author</th>
      <th>publisher</th>
      <th>publish_year</th>
      <th>short_description</th>
      <th>cover</th>
      <th>genre</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $link = mysqli_connect('localhost', 'root', 'jaeger12', 'pwl2022', '3306') or die(mysqli_connect_error());
    $query = "SELECT isbn, title , author, publisher , publish_year, short_description, cover, genre_id FROM book ";
    if ($result = mysqli_query($link, $query) or die(mysqli_error($link)));
    while ($row = mysqli_fetch_array($result)) {
      echo '<tr>';
      echo '<td>' . $row['isbn'] . '</td>';
      echo '<td>' . $row['title'] . '</td>';
      echo '<td>' . $row['author'] . '</td>';
      echo '<td>' . $row['publisher'] . '</td>';
      echo '<td>' . $row['publish_year'] . '</td>';
      echo '<td>' . $row['short_description'] . '</td>';
      echo '<td>' . $row['cover'] . '</td>';
      echo '<td>' . $row['genre_id'] . '</td>';
      echo '</tr>';
    }
    ?>
  </tbody>
</table>
<script>
  $(document).ready(function() {
    $('#myTable').DataTable();
  })
</script>