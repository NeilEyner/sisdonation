<section id="donaciones" class="hero-section mt-5 pt-5">
    <br>
    <div class="container">
        <h2 class="display-4 mb-4 text-center">Donaciones</h2>

        <!-- Carrusel de imágenes cuadradas -->
        <div id="carouselProductos" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="<?= base_url('assets/images/logo/letras_logo.png')?>" class="img-fluid rounded" alt="Producto 1">
                        </div>
                        <div class="col-md-4">
                            <img src="<?= base_url('assets/images/logo/letras_logo.png')?>" class="img-fluid rounded" alt="Producto 2">
                        </div>
                        <div class="col-md-4">
                            <img src="<?= base_url('assets/images/logo/letras_logo.png')?>" class="img-fluid rounded" alt="Producto 3">
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row">
                        <div class="col-md-4">
                            <img src="<?= base_url('assets/images/logo/letras_logo.png')?>" class="img-fluid rounded" alt="Producto 4">
                        </div>
                        <div class="col-md-4">
                            <img src="<?= base_url('assets/images/logo/letras_logo.png')?>" class="img-fluid rounded" alt="Producto 5">
                        </div>
                        <div class="col-md-4">
                            <img src="<?= base_url('assets/images/logo/letras_logo.png')?>" class="img-fluid rounded" alt="Producto 6">
                        </div>
                    </div>
                </div>
                <!-- Agrega más carousel-items según sea necesario -->
            </div>
            <!-- Botones de navegación -->
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselProductos" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselProductos" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Siguiente</span>
            </button>
        </div>
    </div>
</section>
