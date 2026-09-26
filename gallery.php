<?php
include('include/header.php');
require_once('admin/includes/data-store.php');
$galleryItems = read_json('gallery.json', []);
?>


<!-- Page Header Start -->
<div class="page-header parallaxie">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12">
                <!-- Page Header Box Start -->
                <div class="page-header-box">
                    <h1 class="text-anime-style-2" data-cursor="-opaque">Our <span>gallery</span></h1>
                    <nav class="wow fadeInUp">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index">home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">our gallery</li>
                        </ol>
                    </nav>
                </div>
                <!-- Page Header Box End -->
            </div>
        </div>
    </div>
</div>
<!-- Page Header End -->

<?php
include('include/scroll-ticker.php');
?>

<!-- Photo Gallery Section Start -->
<div class="page-gallery">
    <div class="container">
        <!-- gallery section start -->
        <div class="row gallery-items page-gallery-box">
            <?php foreach ($galleryItems as $index => $item): ?>
                <?php $mediaType = $item['type'] ?? 'image'; ?>
                <div class="col-lg-4 col-6">
                    <div class="photo-gallery wow fadeInUp" data-wow-delay="<?php echo ($index % 5) * 0.2 ?>s">
                        <?php if ($mediaType === 'image'): ?>
                            <!-- Image Gallery start -->
                            <a href="<?php echo htmlspecialchars($item['path']) ?>" class="gallery-lightbox-image" data-cursor-text="View">
                                <figure class="image-anime">
                                    <img src="<?php echo htmlspecialchars($item['path']) ?>" alt="<?php echo htmlspecialchars($item['caption'] ?? '') ?>">
                                </figure>
                            </a>
                            <!-- Image Gallery end -->
                        <?php elseif ($mediaType === 'video'): ?>
                            <!-- Video Gallery start -->
                            <figure class="image-anime gallery-video-item">
                                <video controls preload="metadata">
                                    <source src="<?php echo htmlspecialchars($item['path']) ?>">
                                </video>
                            </figure>
                            <!-- Video Gallery end -->
                        <?php elseif ($mediaType === 'youtube'): ?>
                            <!-- YouTube Gallery start -->
                            <a href="https://www.youtube.com/watch?v=<?php echo htmlspecialchars($item['video_id']) ?>" class="popup-video gallery-media-thumb" data-cursor-text="Play">
                                <figure class="image-anime">
                                    <img src="https://img.youtube.com/vi/<?php echo htmlspecialchars($item['video_id']) ?>/hqdefault.jpg" alt="<?php echo htmlspecialchars($item['caption'] ?? '') ?>">
                                </figure>
                                <span class="gallery-play-icon"><i class="fa-solid fa-play"></i></span>
                            </a>
                            <!-- YouTube Gallery end -->
                        <?php elseif ($mediaType === 'instagram'): ?>
                            <!-- Instagram Gallery start -->
                            <a href="<?php echo htmlspecialchars($item['url']) ?>" target="_blank" rel="noopener" class="gallery-instagram-card" data-cursor-text="View">
                                <span class="gallery-instagram-icon"><i class="fa-brands fa-instagram"></i></span>
                                <span class="gallery-instagram-label">Watch on Instagram</span>
                            </a>
                            <!-- Instagram Gallery end -->
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <!-- gallery section end -->
    </div>
</div>
<!-- Photo Gallery Section End -->

<?php
include('include/footer.php');
?>