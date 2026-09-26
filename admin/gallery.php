<?php
require_once __DIR__ . '/includes/data-store.php';
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/includes/media-helpers.php';

$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? "https" : "http";
$currentUrl = $protocol . "://" . $_SERVER['HTTP_HOST'];
require_admin_login($currentUrl);

$siteRoot = dirname(__DIR__);
$uploadDir = $siteRoot . '/images/gallery';

$allowedImageExt = ['jpg', 'jpeg', 'png', 'webp', 'gif'];
$allowedImageMime = ['image/jpeg', 'image/png', 'image/webp', 'image/gif'];
$maxImageSize = 5 * 1024 * 1024;

$allowedVideoExt = ['mp4', 'webm', 'mov'];
$allowedVideoMime = ['video/mp4', 'video/webm', 'video/quicktime'];
$maxVideoSize = 50 * 1024 * 1024;

$uploadErrorMessages = [
    UPLOAD_ERR_INI_SIZE => 'The file is larger than this server allows (upload_max_filesize/post_max_size in php.ini).',
    UPLOAD_ERR_FORM_SIZE => 'The file is larger than this form allows.',
    UPLOAD_ERR_PARTIAL => 'The file was only partially uploaded. Please try again.',
    UPLOAD_ERR_NO_TMP_DIR => 'Server is missing a temporary folder for uploads. Contact your host.',
    UPLOAD_ERR_CANT_WRITE => 'Server could not write the uploaded file to disk. Check folder permissions.',
    UPLOAD_ERR_EXTENSION => 'A server extension blocked the upload.',
];

$message = '';
$messageType = '';

function gallery_next_id($gallery) {
    $nextId = 1;
    foreach ($gallery as $item) {
        if (($item['id'] ?? 0) >= $nextId) $nextId = $item['id'] + 1;
    }
    return $nextId;
}

function gallery_ensure_upload_dir($uploadDir, &$message, &$messageType) {
    if (!is_dir($uploadDir) && !@mkdir($uploadDir, 0755, true) && !is_dir($uploadDir)) {
        $message = 'Could not create the images/gallery folder. In cPanel File Manager, create it manually and set permissions to 755.';
        $messageType = 'danger';
        return false;
    }
    if (!is_writable($uploadDir)) {
        $message = 'The images/gallery folder exists but is not writable by the web server. Set its permissions to 755 (or 775) via cPanel File Manager.';
        $messageType = 'danger';
        return false;
    }
    return true;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!csrf_check($_POST['csrf_token'] ?? '')) {
        $message = 'Session expired, please try again.';
        $messageType = 'danger';
    } elseif (($_POST['action'] ?? '') === 'add_image') {
        $caption = trim($_POST['caption'] ?? '');

        if (empty($_FILES['image']) || $_FILES['image']['error'] === UPLOAD_ERR_NO_FILE) {
            $message = 'Please choose an image to upload.';
            $messageType = 'danger';
        } elseif ($_FILES['image']['error'] !== UPLOAD_ERR_OK) {
            $errCode = $_FILES['image']['error'];
            $message = $uploadErrorMessages[$errCode] ?? ('Upload failed (error code ' . $errCode . '). Please try again.');
            $messageType = 'danger';
        } elseif ($_FILES['image']['size'] > $maxImageSize) {
            $message = 'Image must be smaller than 5MB.';
            $messageType = 'danger';
        } else {
            $tmpPath = $_FILES['image']['tmp_name'];
            $ext = strtolower(pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION));
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime = finfo_file($finfo, $tmpPath);
            finfo_close($finfo);

            if (!in_array($ext, $allowedImageExt, true) || !in_array($mime, $allowedImageMime, true) || getimagesize($tmpPath) === false) {
                $message = 'Only JPG, PNG, GIF or WEBP images are allowed.';
                $messageType = 'danger';
            } elseif (gallery_ensure_upload_dir($uploadDir, $message, $messageType)) {
                $filename = bin2hex(random_bytes(8)) . '.' . $ext;
                $destination = $uploadDir . '/' . $filename;

                error_clear_last();
                if (move_uploaded_file($tmpPath, $destination)) {
                    $gallery = read_json('gallery.json', []);
                    $gallery[] = [
                        'id' => gallery_next_id($gallery),
                        'type' => 'image',
                        'path' => 'images/gallery/' . $filename,
                        'caption' => $caption,
                    ];
                    write_json('gallery.json', $gallery);
                    $message = 'Image added to gallery.';
                    $messageType = 'success';
                } else {
                    $lastError = error_get_last();
                    $message = 'Could not save the uploaded image' . ($lastError ? ' (' . $lastError['message'] . ')' : '') . '.';
                    $messageType = 'danger';
                }
            }
        }
    } elseif (($_POST['action'] ?? '') === 'add_video') {
        $caption = trim($_POST['caption'] ?? '');

        if (empty($_FILES['video']) || $_FILES['video']['error'] === UPLOAD_ERR_NO_FILE) {
            $message = 'Please choose a video to upload.';
            $messageType = 'danger';
        } elseif ($_FILES['video']['error'] !== UPLOAD_ERR_OK) {
            $errCode = $_FILES['video']['error'];
            $message = $uploadErrorMessages[$errCode] ?? ('Upload failed (error code ' . $errCode . '). Please try again.');
            $messageType = 'danger';
        } elseif ($_FILES['video']['size'] > $maxVideoSize) {
            $message = 'Video must be smaller than 50MB.';
            $messageType = 'danger';
        } else {
            $tmpPath = $_FILES['video']['tmp_name'];
            $ext = strtolower(pathinfo($_FILES['video']['name'], PATHINFO_EXTENSION));
            $finfo = finfo_open(FILEINFO_MIME_TYPE);
            $mime = finfo_file($finfo, $tmpPath);
            finfo_close($finfo);

            if (!in_array($ext, $allowedVideoExt, true) || !in_array($mime, $allowedVideoMime, true)) {
                $message = 'Only MP4, WEBM or MOV videos are allowed.';
                $messageType = 'danger';
            } elseif (gallery_ensure_upload_dir($uploadDir, $message, $messageType)) {
                $filename = bin2hex(random_bytes(8)) . '.' . $ext;
                $destination = $uploadDir . '/' . $filename;

                error_clear_last();
                if (move_uploaded_file($tmpPath, $destination)) {
                    $gallery = read_json('gallery.json', []);
                    $gallery[] = [
                        'id' => gallery_next_id($gallery),
                        'type' => 'video',
                        'path' => 'images/gallery/' . $filename,
                        'caption' => $caption,
                    ];
                    write_json('gallery.json', $gallery);
                    $message = 'Video added to gallery.';
                    $messageType = 'success';
                } else {
                    $lastError = error_get_last();
                    $message = 'Could not save the uploaded video' . ($lastError ? ' (' . $lastError['message'] . ')' : '') . '.';
                    $messageType = 'danger';
                }
            }
        }
    } elseif (($_POST['action'] ?? '') === 'add_youtube') {
        $caption = trim($_POST['caption'] ?? '');
        $url = trim($_POST['youtube_url'] ?? '');
        $videoId = extract_youtube_id($url);

        if (!$videoId) {
            $message = 'Please enter a valid YouTube video or Shorts link.';
            $messageType = 'danger';
        } else {
            $gallery = read_json('gallery.json', []);
            $gallery[] = [
                'id' => gallery_next_id($gallery),
                'type' => 'youtube',
                'video_id' => $videoId,
                'caption' => $caption,
            ];
            write_json('gallery.json', $gallery);
            $message = 'YouTube video added to gallery.';
            $messageType = 'success';
        }
    } elseif (($_POST['action'] ?? '') === 'add_instagram') {
        $caption = trim($_POST['caption'] ?? '');
        $url = trim($_POST['instagram_url'] ?? '');

        if (!filter_var($url, FILTER_VALIDATE_URL) || !is_instagram_url($url)) {
            $message = 'Please enter a valid Instagram post or reel link.';
            $messageType = 'danger';
        } else {
            $gallery = read_json('gallery.json', []);
            $gallery[] = [
                'id' => gallery_next_id($gallery),
                'type' => 'instagram',
                'url' => $url,
                'caption' => $caption,
            ];
            write_json('gallery.json', $gallery);
            $message = 'Instagram reel added to gallery.';
            $messageType = 'success';
        }
    } elseif (($_POST['action'] ?? '') === 'delete') {
        $id = (int) ($_POST['id'] ?? 0);
        $gallery = read_json('gallery.json', []);
        $remaining = [];
        foreach ($gallery as $item) {
            if (($item['id'] ?? 0) === $id) {
                $path = $item['path'] ?? '';
                if (strpos($path, 'images/gallery/') === 0) {
                    $absolute = $siteRoot . '/' . $path;
                    if (is_file($absolute)) {
                        unlink($absolute);
                    }
                }
                continue;
            }
            $remaining[] = $item;
        }
        write_json('gallery.json', $remaining);
        $message = 'Item removed from gallery.';
        $messageType = 'success';
    }
}

$gallery = read_json('gallery.json', []);

$mediaTypes = ['image', 'video', 'youtube', 'instagram'];
$reopenModalType = null;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $submittedType = substr($_POST['action'] ?? '', 4);
    if (in_array($submittedType, $mediaTypes, true)) {
        $reopenModalType = $submittedType;
    }
}

$pageTitle = 'Gallery';
$adminActive = 'gallery';
include __DIR__ . '/includes/layout-header.php';
?>

<div class="admin-topbar">
    <h1>Gallery</h1>
    <button type="button" class="admin-btn" id="openAddMediaModal">+ Add Media</button>
</div>

<?php if ($message): ?>
    <div class="admin-alert admin-alert-<?php echo $messageType ?>"><?php echo htmlspecialchars($message) ?></div>
<?php endif; ?>

<div class="admin-modal-overlay" id="addMediaModalOverlay">
    <div class="admin-modal">
        <button type="button" class="admin-modal-close" id="closeAddMediaModal" aria-label="Close">&times;</button>
        <h3 style="margin-top:0;">Add Media</h3>

        <div class="admin-modal-tabs">
            <button type="button" class="admin-modal-tab" data-type="image">Image</button>
            <button type="button" class="admin-modal-tab" data-type="video">Video</button>
            <button type="button" class="admin-modal-tab" data-type="youtube">YouTube</button>
            <button type="button" class="admin-modal-tab" data-type="instagram">Instagram</button>
        </div>

        <form method="POST" enctype="multipart/form-data" class="admin-form" id="addMediaForm">
            <input type="hidden" name="csrf_token" value="<?php echo csrf_token() ?>">
            <input type="hidden" name="action" id="addMediaAction" value="add_image">

            <div class="admin-modal-field" data-field="image">
                <div class="form-group">
                    <label for="image">Image file (JPG, PNG, GIF or WEBP, up to 5MB)</label>
                    <input type="file" id="image" name="image" accept="image/jpeg,image/png,image/webp,image/gif">
                </div>
            </div>

            <div class="admin-modal-field" data-field="video" hidden>
                <div class="form-group">
                    <label for="video">Video file (MP4, WEBM or MOV, up to 50MB)</label>
                    <input type="file" id="video" name="video" accept="video/mp4,video/webm,video/quicktime">
                </div>
            </div>

            <div class="admin-modal-field" data-field="youtube" hidden>
                <div class="form-group">
                    <label for="youtube_url">YouTube link</label>
                    <input type="text" id="youtube_url" name="youtube_url" placeholder="https://www.youtube.com/watch?v=...">
                </div>
            </div>

            <div class="admin-modal-field" data-field="instagram" hidden>
                <div class="form-group">
                    <label for="instagram_url">Instagram reel/post link</label>
                    <input type="text" id="instagram_url" name="instagram_url" placeholder="https://www.instagram.com/reel/...">
                </div>
            </div>

            <div class="form-group">
                <label for="caption">Caption (optional)</label>
                <input type="text" id="caption" name="caption" placeholder="e.g. Free weights area">
            </div>

            <button type="submit" class="admin-btn" style="width:100%;">Add to Gallery</button>
        </form>
    </div>
</div>

<script>
    (function () {
        var overlay = document.getElementById('addMediaModalOverlay');
        var openBtn = document.getElementById('openAddMediaModal');
        var closeBtn = document.getElementById('closeAddMediaModal');
        var tabs = document.querySelectorAll('.admin-modal-tab');
        var fields = document.querySelectorAll('.admin-modal-field');
        var actionInput = document.getElementById('addMediaAction');

        function openModal() {
            overlay.classList.add('active');
        }

        function closeModal() {
            overlay.classList.remove('active');
        }

        function selectType(type) {
            tabs.forEach(function (t) {
                t.classList.toggle('active', t.getAttribute('data-type') === type);
            });
            fields.forEach(function (field) {
                var isMatch = field.getAttribute('data-field') === type;
                field.hidden = !isMatch;
                var input = field.querySelector('input');
                if (input) {
                    if (isMatch) {
                        input.setAttribute('required', 'required');
                    } else {
                        input.removeAttribute('required');
                        input.value = '';
                    }
                }
            });
            actionInput.value = 'add_' + type;
        }

        openBtn.addEventListener('click', function () {
            openModal();
        });

        closeBtn.addEventListener('click', closeModal);

        overlay.addEventListener('click', function (e) {
            if (e.target === overlay) closeModal();
        });

        tabs.forEach(function (tab) {
            tab.addEventListener('click', function () {
                selectType(tab.getAttribute('data-type'));
            });
        });

        selectType('<?php echo $reopenModalType ?: 'image' ?>');
        <?php if ($reopenModalType): ?>
            openModal();
        <?php endif; ?>
    })();
</script>

<div class="admin-card">
    <h3 style="margin-top:0;">Gallery Items</h3>
    <div class="admin-gallery-grid">
        <?php foreach ($gallery as $item): ?>
            <?php $type = $item['type'] ?? 'image'; ?>
            <div class="admin-gallery-item">
                <?php if ($type === 'image'): ?>
                    <img src="<?php echo $currentUrl . '/' . htmlspecialchars($item['path']) ?>" alt="<?php echo htmlspecialchars($item['caption'] ?? '') ?>">
                <?php elseif ($type === 'video'): ?>
                    <video src="<?php echo $currentUrl . '/' . htmlspecialchars($item['path']) ?>" muted></video>
                    <span class="admin-media-badge">Video</span>
                <?php elseif ($type === 'youtube'): ?>
                    <img src="https://img.youtube.com/vi/<?php echo htmlspecialchars($item['video_id']) ?>/hqdefault.jpg" alt="<?php echo htmlspecialchars($item['caption'] ?? '') ?>">
                    <span class="admin-media-badge">YouTube</span>
                <?php elseif ($type === 'instagram'): ?>
                    <div class="admin-gallery-placeholder">Instagram</div>
                    <span class="admin-media-badge">Instagram</span>
                <?php endif; ?>
                <form method="POST" onsubmit="return confirm('Remove this item from the gallery?');">
                    <input type="hidden" name="csrf_token" value="<?php echo csrf_token() ?>">
                    <input type="hidden" name="action" value="delete">
                    <input type="hidden" name="id" value="<?php echo (int) $item['id'] ?>">
                    <button type="submit" class="admin-btn admin-btn-danger admin-btn-sm">&times;</button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php include __DIR__ . '/includes/layout-footer.php'; ?>
