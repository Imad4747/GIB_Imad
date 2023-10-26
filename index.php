<!DOCTYPE html>
<html>
<head>
<style>
  body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;

  }

  .navbar {
    background-color: black;
    display: flex;
    flex-direction: column;
   
  }

  .top-navbar {
    padding: 10px;
    text-align: center;
    background-color: black;
  }

  .search-bar {
    display: inline-block;
    background-color: #444;
    padding: 10px;
    border-radius: 5px;
  }

  .search-bar input {
    padding: 5px;
    margin-right: 5px;
    border: none;
    border-radius: 5px;
  }

  

  .bottom-navbar {
    padding: 10px 0;
    
    border-top: 1px solid white;
    background-color: black;
  }

  ul {
    list-style: none;
    padding: 0;
    margin: 0;
    display: flex;
    justify-content: center;
  }

  li {
    margin: 5px;
  }

  a {
    text-decoration: none;
    color: #fff;
    transition: background-color 0.2s;
    margin: 25px;
  }
  a:hover {
    background-color: rgba(255, 255, 255, 0.2);
    border-radius: 10px;
    padding: 15px;
    
    
  }
  
</style>
</head>
<body>
  <div class="navbar">
    <div class="top-navbar">
      <div class="search-bar">
        <input type="text" placeholder="Search">
       
      </div>
    </div>
    <div class="bottom-navbar">
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="product.php">Product</a></li>
        <li><a href="contact.php">Contact</a></li>
        <li><a href="loguit.php"><svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><style>svg{fill:white;}</style><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"/></svg></a><li>
            
      </ul>
    </div>
  </div>
</body>
</html>
