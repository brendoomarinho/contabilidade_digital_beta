 <!-- Modal Admissão -->
 <div class="modal fade" id="add-funcionario">
     <div class="modal-dialog modal-lg">
         <div class="modal-content">
             <div class="page-wrapper-new p-0">
                 <div class="modal-header border-0 custom-modal-header">
                     <div class="page-title">
                         <h4>Formulário de admissão</h4>
                     </div>
                     <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                         <span aria-hidden="true">&times;</span>
                     </button>
                 </div>
                 <div class="modal-body custom-modal-body">
                     <form method="post" action="{{ route('funcionarios.admissao') }}" enctype="multipart/form-data">
                         @csrf
                         <div class="row">
                             <div class="col-lg-12">
                                 <h5 class="card-title mb-2">Dados para admissão</h5>
                                 <div class="row">
                                     <div class="col-md-6">
                                         <div class="mb-3">
                                             <label class="form-label">Nome completo</label>
                                             <input type="text" name="nome" class="form-control">
                                         </div>
                                         <div class="mb-3">
                                             <label class="form-label">Data admissão</label>
                                             <input type="date" name="dt_admissao" class="form-control">
                                         </div>
                                         <div class="mb-3">
                                             <label class="form-label">Jornada</label>
                                             <select class="select" name="jornada">
                                                 <option>Selecione</option>
                                                 <option value="1">A+</option>
                                                 <option value="2">O+</option>
                                                 <option value="3">B+</option>
                                                 <option value="4">AB+</option>
                                             </select>
                                         </div>
                                         <div class="mb-3">
                                             <label class="form-label">Telefone</label>
                                             <input type="text" name="telefone" class="form-control">
                                         </div>
                                     </div>
                                     <div class="col-md-6">
                                         <div class="mb-3">
                                             <label class="form-label">CPF</label>
                                             <input type="text" name="cpf" class="form-control">
                                         </div>
                                         <div class="mb-3">
                                             <label class="form-label">Cargo/Função</label>
                                             <input type="text" name="cargo" class="form-control">
                                         </div>

                                         <div class="mb-3">
                                             <label class="form-label">Salário</label>
                                             <input type="text" name="salario" class="form-control">
                                         </div>
                                         <div class="mb-3">
                                             <label class="d-block">Modalidade:</label>
                                             <div class="form-check form-check-inline">
                                                 <input class="form-check-input" type="radio" name="modalidade"
                                                     id="gender_male" value="contrato">
                                                 <label class="form-check-label" for="gender_male">Contrato</label>
                                             </div>
                                             <div class="form-check form-check-inline">
                                                 <input class="form-check-input" type="radio" name="modalidade"
                                                     id="gender_female" value="estágio">
                                                 <label class="form-check-label" for="gender_female">Estágio</label>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                                 <h5 class="card-title mb-2">Documentos anexos</h5>
                                 <span>Por favor, anexar: rg, exame admissional e comprovante de residencia</span>
                                 <!-- Anexo Multiple -->
                                 @component('components.upload-file')
                                 @endcomponent
                                 <script src="{{ asset('build/js/upload-file.js') }}"></script>
                             </div>
                         </div>
                         <div class="modal-footer-btn">
                             <button type="button" class="btn btn-cancel me-2"
                                 data-bs-dismiss="modal">Cancelar</button>
                             <button type="submit" class="btn btn-submit">Enviar</button>
                         </div>
                     </form>
                 </div>
             </div>
         </div>
     </div>
 </div>
