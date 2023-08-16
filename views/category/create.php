<section id="section">
    <div class="spacing-90px"></div>
    <h2>Crear una nueva categoría</h2>
    <div class="category-create">
        <form action="/category/save" method="POST">
            <label for="name">Nombre:</label>
            <input type="text" name="name" id="name" required />

            <input type="submit" value="Crear una categoría" />
        </form>
    </div>

</section>    