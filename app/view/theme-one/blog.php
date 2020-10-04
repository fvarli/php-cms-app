<?php require view('static/header') ?>

<section class="jumbotron text-center">
    <div class="container">
        <h1>BLOG</h1>
        <div class="breadcrumb-custom">
            <a href="#">Home</a> /
            <a href="#" class="active">Blog</a>
        </div>
    </div>
</section>
<div class="container">
    <div class="row">
        <div class="col-md-8">

            <h4 class="pb-3">Last Articles</h4>

            <div class="card mb-3">
                <div class="card-header">
                    CSS, HTML
                    <div class="date">
                        21 Haziran 2018, 21:15
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title">Mac’de MAMP Mysql Başlamıyor Hatası ve Çözümü</h5>
                    <p class="card-text">
                        Özellikle aniden bilgisayar kapandığında vs. mamp’ı tekrar çalıştırdığınızda sadece apache’nin
                        çalıştığını fark ediyorsunuz. mysql server bir türlü aktif olmuyor. Böyle bir durumla
                        karşılaşırsanız terminal’i açıp şu komutu çalıştırın;
                    </p>
                    <a href="#" class="btn btn-dark">Görüntüle</a>
                </div>
            </div>

            <div class="card mb-3">
                <div class="card-header">
                    PHP
                    <div class="date">
                        21 Haziran 2018, 21:15
                    </div>
                </div>
                <div class="card-body">
                    <h5 class="card-title">PHP ile Excel Dosyalarını Okumak</h5>
                    <p class="card-text">
                        <a href="https://www.erbilen.net/php-excel/">Şu yazımda</a> php ile nasıl excel dosyası
                        oluşturulacağını göstermiştim. Bu yazımda ise, daha elzem bir konuya değineceğiz. Geçenlerde bir
                        excel dosyasının içinden verileri almam gerekti, araştırırken baktım ki çok kalabalık kodlar
                        var, benim amacım alt tarafı satır satır okuyup verileri almak o kadar. Sonra bir repo’ya denk
                        geldim, Sergey Shuchkin abimiz bir sınıf yazmış bu işlemler için. Basit, kullanışlı, amaca hitap
                        ediyor.
                    </p>
                    <a href="#" class="btn btn-dark">View</a>
                </div>
            </div>

            <div class="pagination-container text-center mb-4">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                                <span class="sr-only">Previous</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">1</a></li>
                        <li class="page-item active"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                                <span class="sr-only">Next</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>

        </div>
        <div class="col-md-4">
            <h4 class="pb-3">
                <i class="fa fa-folder"></i>
                Categories
            </h4>
            <ul class="list-group mb-4">
                <?php foreach (Blog::Categories() as $category): ?>
                    <li class="list-group-item">
                        <a href="<?=site_url('blog/category/' . $category['category_url'])?>" style="color: #333;" class="d-flex justify-content-between align-items-center">
                            <?=$category['category_name']?>
                            <!--                            <span class="badge badge-dark badge-pill">14</span>-->
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
            <h4 class="pb-3">
                <i class="fa fa-hashtag"></i>
                Tags
            </h4>
            <a href="#" class="badge badge-light badge-pill">html5 video</a>
            <a href="#" class="badge badge-light badge-pill">html5 audio</a>
            <a href="#" class="badge badge-light badge-pill">css ie7</a>
            <a href="#" class="badge badge-light badge-pill">jquery dersleri</a>
            <a href="#" class="badge badge-light badge-pill">css3 calc()</a>
            <a href="#" class="badge badge-light badge-pill">php array_shift()</a>
            <a href="#" class="badge badge-light badge-pill">gökhan toy</a>
            <a href="#" class="badge badge-light badge-pill">aile</a>
            <a href="#" class="badge badge-light badge-pill">hayat</a>
        </div>
    </div>
</div>

<?php require view('static/footer') ?>
