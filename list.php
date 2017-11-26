<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous" rel="stylesheet" />
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous" rel="stylesheet" />
    <link href="tablesorter.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.28.15/js/jquery.tablesorter.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.28.15/js/jquery.tablesorter.widgets.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/mark.js/8.11.0/jquery.mark.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.28.15/js/widgets/widget-mark.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="tablesorter.js"></script>
    <title>Ürünler</title>
  </head>
  <body>
    <?php
    include_once('simple_html_dom.php');
    $html = new simple_html_dom();
    $html->load_file($_POST["link"]);
    $products = array();
    foreach ($html->find('li[class="search-item col lg-1 md-1 sm-1  custom-hover not-fashion-flex"]') as $li) {
      $product = array();
      $product['name'] = $li->find('p[class="hb-pl-cn"]')[0]->find('span')[0]->innertext;
      $product['link'] = '<a href="http://www.hepsiburada.com' . $li->find('a')[0]->href . '">link</a>';
      $product['image'] = '<img src="' . $li->find('img')[0]->src . '"></img>';
      $span = $li->find('span[class="price product-price"]');
      if (count($span) > 0) {
        $product['price'] = $span[0]->innertext;
      }
      else {
        continue;
      }
      $del = $li->find('del[class="price old product-old-price"]');
      if (count($del) > 0) {
        $product['old_price'] = $del[0]->innertext;
      }
      else {
        $product['old_price'] = $span[0]->innertext;
      }
      array_push($products, $product);
    }
    ?>
    <div class="container">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th>İsim</th>
            <th>İndirimsiz Fiyat</th>
            <th>İndirimli Fiyat</th>
            <th class="sorter-false filter-false">Foto</th>
            <th class="sorter-false filter-false">Link</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($products as $product) { ?>
          <tr>
            <td><?php echo $product['name']; ?></td>
            <td><?php echo $product['old_price']; ?></td>
            <td><?php echo $product['price']; ?></td>
            <td><?php echo $product['image']; ?></td>
            <td><?php echo $product['link']; ?></td>
          </tr>
        <?php } ?>
        </tbody>
      </table>
    </div>
  </body>
</html>
