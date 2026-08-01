<!-- Social Share Modal -->
<div class="modal fade" id="socialShareModal" tabindex="-1" aria-labelledby="socialShareModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-4 border-0 shadow-lg">
            <div class="modal-header border-bottom-0 pb-0">
                <h5 class="modal-title al-title-18px fw-semibold" id="socialShareModalLabel">
                    <i class="fi fi-rr-share me-2"></i>{{ get_phrase('Share Product') }}
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-4">
                <p class="text-muted fs-14px mb-4" id="shareProductTitle">{{ get_phrase('Spread the word with your friends & social network') }}</p>
                
                <!-- Social Icons Grid -->
                <div class="row g-3 text-center mb-4" id="socialShareButtonsGrid">
                    <!-- Facebook -->
                    <div class="col-4 col-sm-3">
                        <a href="#" id="shareFb" target="_blank" class="d-flex flex-column align-items-center justify-content-center p-3 rounded-3 text-decoration-none bg-light hover-shadow transition-all">
                            <div class="rounded-circle d-flex align-items-center justify-content-center mb-2" style="width: 48px; height: 48px; background-color: #1877F2; color: #fff;">
                                <i class="fab fa-facebook-f fs-5"></i>
                            </div>
                            <span class="fs-12px text-dark fw-medium">Facebook</span>
                        </a>
                    </div>
                    <!-- Twitter / X -->
                    <div class="col-4 col-sm-3">
                        <a href="#" id="shareTw" target="_blank" class="d-flex flex-column align-items-center justify-content-center p-3 rounded-3 text-decoration-none bg-light hover-shadow transition-all">
                            <div class="rounded-circle d-flex align-items-center justify-content-center mb-2" style="width: 48px; height: 48px; background-color: #000; color: #fff;">
                                <i class="fab fa-x-twitter fs-5"></i>
                            </div>
                            <span class="fs-12px text-dark fw-medium">Twitter</span>
                        </a>
                    </div>
                    <!-- WhatsApp -->
                    <div class="col-4 col-sm-3">
                        <a href="#" id="shareWa" target="_blank" class="d-flex flex-column align-items-center justify-content-center p-3 rounded-3 text-decoration-none bg-light hover-shadow transition-all">
                            <div class="rounded-circle d-flex align-items-center justify-content-center mb-2" style="width: 48px; height: 48px; background-color: #25D366; color: #fff;">
                                <i class="fab fa-whatsapp fs-5"></i>
                            </div>
                            <span class="fs-12px text-dark fw-medium">WhatsApp</span>
                        </a>
                    </div>
                    <!-- Pinterest -->
                    <div class="col-4 col-sm-3">
                        <a href="#" id="sharePi" target="_blank" class="d-flex flex-column align-items-center justify-content-center p-3 rounded-3 text-decoration-none bg-light hover-shadow transition-all">
                            <div class="rounded-circle d-flex align-items-center justify-content-center mb-2" style="width: 48px; height: 48px; background-color: #E60023; color: #fff;">
                                <i class="fab fa-pinterest-p fs-5"></i>
                            </div>
                            <span class="fs-12px text-dark fw-medium">Pinterest</span>
                        </a>
                    </div>
                    <!-- LinkedIn -->
                    <div class="col-4 col-sm-3">
                        <a href="#" id="shareLi" target="_blank" class="d-flex flex-column align-items-center justify-content-center p-3 rounded-3 text-decoration-none bg-light hover-shadow transition-all">
                            <div class="rounded-circle d-flex align-items-center justify-content-center mb-2" style="width: 48px; height: 48px; background-color: #0A66C2; color: #fff;">
                                <i class="fab fa-linkedin-in fs-5"></i>
                            </div>
                            <span class="fs-12px text-dark fw-medium">LinkedIn</span>
                        </a>
                    </div>
                    <!-- Instagram -->
                    <div class="col-4 col-sm-3">
                        <a href="#" id="shareIg" target="_blank" class="d-flex flex-column align-items-center justify-content-center p-3 rounded-3 text-decoration-none bg-light hover-shadow transition-all">
                            <div class="rounded-circle d-flex align-items-center justify-content-center mb-2" style="width: 48px; height: 48px; background-color: #E1306C; color: #fff;">
                                <i class="fab fa-instagram fs-5"></i>
                            </div>
                            <span class="fs-12px text-dark fw-medium">Instagram</span>
                        </a>
                    </div>
                    <!-- Email -->
                    <div class="col-4 col-sm-3">
                        <a href="#" id="shareMail" class="d-flex flex-column align-items-center justify-content-center p-3 rounded-3 text-decoration-none bg-light hover-shadow transition-all">
                            <div class="rounded-circle d-flex align-items-center justify-content-center mb-2" style="width: 48px; height: 48px; background-color: #EA4335; color: #fff;">
                                <i class="fas fa-envelope fs-5"></i>
                            </div>
                            <span class="fs-12px text-dark fw-medium">Email</span>
                        </a>
                    </div>
                </div>

                <!-- Copy Link Field -->
                <div class="border rounded-3 p-2 d-flex align-items-center bg-light">
                    <input type="text" id="shareCopyUrlInput" class="form-control form-control-sm border-0 bg-transparent text-muted fs-13px me-2" readonly>
                    <button type="button" class="btn btn-dark btn-sm text-nowrap rounded-2 px-3" onclick="copyShareUrlToClipboard()">
                        <i class="fas fa-copy me-1" id="shareCopyIcon"></i> <span id="shareCopyText">{{ get_phrase('Copy Link') }}</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function openSocialShareModal(url, title) {
        url = url || window.location.href;
        title = title || document.title;

        const encodedUrl = encodeURIComponent(url);
        const encodedTitle = encodeURIComponent(title);

        document.getElementById('shareFb').href = `https://www.facebook.com/sharer/sharer.php?u=${encodedUrl}`;
        document.getElementById('shareTw').href = `https://twitter.com/intent/tweet?url=${encodedUrl}&text=${encodedTitle}`;
        document.getElementById('shareWa').href = `https://api.whatsapp.com/send?text=${encodedTitle}%20${encodedUrl}`;
        document.getElementById('sharePi').href = `https://pinterest.com/pin/create/button/?url=${encodedUrl}&description=${encodedTitle}`;
        document.getElementById('shareLi').href = `https://www.linkedin.com/sharing/share-offsite/?url=${encodedUrl}`;
        document.getElementById('shareIg').href = `https://www.instagram.com/`;
        document.getElementById('shareMail').href = `mailto:?subject=${encodedTitle}&body=${encodedUrl}`;
        document.getElementById('shareCopyUrlInput').value = url;

        // Reset copy button text
        document.getElementById('shareCopyText').innerText = "{{ get_phrase('Copy Link') }}";
        document.getElementById('shareCopyIcon').className = "fas fa-copy me-1";

        const shareModal = new bootstrap.Modal(document.getElementById('socialShareModal'));
        shareModal.show();
    }

    function copyShareUrlToClipboard() {
        const copyInput = document.getElementById('shareCopyUrlInput');
        copyInput.select();
        copyInput.setSelectionRange(0, 99999);
        navigator.clipboard.writeText(copyInput.value).then(function() {
            document.getElementById('shareCopyText').innerText = "{{ get_phrase('Copied!') }}";
            document.getElementById('shareCopyIcon').className = "fas fa-check me-1 text-success";
        });
    }
</script>
