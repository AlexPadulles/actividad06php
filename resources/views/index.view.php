
<div class=" container mx-auto bg-yellow-100 my-10 border-4 border-yellow-800">
<h1 class="text-center text-3xl pt-5">Selecciona el tipo de local y la población</h1>
  <form action="/resources/controllers/controller.filtrar.php" method="POST">
    <div class="grid grid-cols-3 gap-4 mt-20 ">
           <div class="mx-auto">
            <label class="text-lg">Seleccione la ciudad</label>
            <select class="" name="ciudad">  
                <option value='Alcoy'> Alcoy</option>
                <option value='Benidorm'> Benidorm</option>
            </select>
          </div>
          <div class="mx-auto">
            <label class="text-lg">Seleccione el tipo</label>
            <select class="" name="tipo">
                <option value='Bar'> Bar</option>
                <option value='Discoteca'> Discoteca</option>
                <option value='Restaurante'> Restaurante</option>
             </select>
          </div>
          <div class="mx-auto mb-20">
            <button name="submit" 
                class="text-green-300  hover:text-white border border-green-200 hover:bg-green-300 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-green-400 dark:text-green-400 dark:hover:text-white dark:hover:bg-green-300 dark:focus:ring-green-800" 
                type="submit">
                Filtrar Busqueda
            </button>
          </div>   
    </div>
  </form>  
</div>    
