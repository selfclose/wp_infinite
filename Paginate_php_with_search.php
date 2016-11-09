<h2>Pagination - PHP</h2>
<?php
include (__DIR__.'/include.php');

?>
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.css">
<?php

$page = isset($_GET['page']) ? $_GET['page'] : 1; //get current page

$limit = 3; //per page

$search = $_GET['search'];

$book = new \RB\Model\Book();
$allBook = $book->paginateAction($page, $limit, 'id', false, 'name', $search);
?>
<hr/>
<form action=''>
    <input type="text" name="search" />
    <button type="submit">Search</button>
</form>
<?php

//this is paginate button, MUST inject $page & $limit In 'same' value as paginateAction
foreach ($allBook as $ALL) {
    echo "<p>".$ALL->id.'. '.$ALL->name."</p>";
}
echo "<hr/> OR use on bootstrap table";

?>

<table class="table table-hover table-striped">
    <thead>
    <tr>
        <th>#</th>
        <th>Book Name</th>
        <th>Price</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($allBook as $ALL) : ?>
    <tr>
        <th scope="row"><?=$ALL->id?></th>
        <td><?=$ALL->name?></td>
        <td><?=$ALL->price?></td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<?php
echo $book->paginateButtonAction($page, $limit);

echo "<p>Searching: ".$search."</p>";
echo "<p>Result: ".count($allBook)."</p>";
