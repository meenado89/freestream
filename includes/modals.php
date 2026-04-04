
<div id="videoModal" class="modal-overlay">
            <div class="modal-box">
                <button class="modal-close" onclick="closeModal()">✕ Close</button>
                <div class="modal-player">
                    <!-- AD OVERLAY before movie plays -->
                    <div class="ad-overlay" id="adOverlay">
                        <p>Ad playing... <span id="adTimer">5</span>s</p>
                        <button id="skipBtn" onclick="skipAd()" disabled>Wait 5s...</button>
                    </div>
                    <iframe id="movieFrame" src="" allowfullscreen></iframe>
                </div>
                <div class="modal-info">
                    <h2 id="modalTitle"></h2>
                    <div id="modalMeta" class="modal-meta"></div>
                    <p id="modalDesc"></p>
                </div>
            </div>
        </div>
        