<!-- Delete Note -->
<div class="modal fade" id="successModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="page-wrapper-new p-0">
                <div class="content">
                    <div class="delete-popup">
                        <div class="delete-image text-center mx-auto">
                        <i class="fa-regular fa-circle-check fa-2xl" style="color: #63E6BE;"></i>
                            {{--<img src="{{ URL::asset('/build/img/icons/circle-check-regular.svg') }}" alt="Img"--}}
                        </div>
                        <div class="delete-heads">
                            <h4>Enviado com sucesso!</h4>
                            <p>{{ session('successMessage') }}</p>
                        </div>
                        <div class="modal-footer-btn delete-footer">
                            <button type="button" class="btn btn-success me-2" data-bs-dismiss="modal">OK</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Delete Note -->

<!-- Delete Note -->
<div class="modal fade" id="successModalUpdate">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="page-wrapper-new p-0">
                <div class="content">
                    <div class="delete-popup">
                        <div class="delete-image text-center mx-auto">
                        <i class="fa-regular fa-circle-check fa-2xl" style="color: #63E6BE;"></i>
                            {{--<img src="{{ URL::asset('/build/img/icons/circle-check-regular.svg') }}" alt="Img"--}}
                        </div>
                        <div class="delete-heads">
                            <h4>Registro atualizado!</h4>
                            <p>{{ session('successMessage') }}</p>
                        </div>
                        <div class="modal-footer-btn delete-footer">
                            <button type="button" class="btn btn-success me-2" data-bs-dismiss="modal">OK</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /Delete Note -->
