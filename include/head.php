<?php
    $sql_n = "SELECT * FROM navs WHERE active = 1 and visible = 1";
    $query_n = $connection->prepare($sql_n);
    $query_n->execute();
    $total_n = $query_n->rowCount();
?>
<?php if($total_n > 0) { ?>
<header>
	<nav class="navbar navbar-default navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
			    <a class="navbar-brand" href="index.php">Logo</a>
			</div>
		    
		   	<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      	<ul class="nav navbar-nav navbar-right">
                    <?php while ($rows_n = $query_n->fetch()) { ?>
                        <li><a href="<?php echo $rows_n['url']; ?>" target="<?php echo $rows['target']; ?>"><?php echo $rows_n['name']; ?></a></li>
                    <?php } ?>
		      	</ul>
		    </div><!-- /.navbar-collapse -->
		  </div><!-- /.container-fluid -->
	</nav>
</header>
<?php } ?>