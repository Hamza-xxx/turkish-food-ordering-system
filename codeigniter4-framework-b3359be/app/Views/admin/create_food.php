<!DOCTYPE html>
<html>
<head>

    <title>Yeni Yemek</title>

</head>
<body>

<h1>Yeni Yemek Ekle</h1>

<form action="/php/food-order-ci4/public/admin/store-food"
      method="POST"
      enctype="multipart/form-data">

    <input type="text"
           name="name"
           placeholder="Yemek Adı">

    <br><br>

    <textarea name="description"
              placeholder="Açıklama"></textarea>

    <br><br>

    <input type="number"
           step="0.01"
           name="price"
           placeholder="Fiyat">

    <br><br>

    <select name="category">

        <option value="burgers">Burgerler</option>

        <option value="pizzas">Pizzalar</option>

        <option value="bbqs">Izgaralar</option>

        <option value="desserts">Tatlılar</option>

        <option value="drinks">İçecekler</option>

    </select>

    <br><br>

    <input type="file" name="image">

    <br><br>

    <button type="submit">

        Kaydet

    </button>

</form>

</body>
</html>