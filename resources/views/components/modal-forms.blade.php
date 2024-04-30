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
                                             <input type="text" name="nome" class="form-control"
                                                 value="{{ old('nome') }}">
                                             @error('nome')
                                                 <div class="alert alert-danger">{{ $message }}</div>
                                             @enderror
                                         </div>
                                         <div class="mb-3">
                                             <label class="form-label">Data admissão</label>
                                             <input type="date" name="dt_admissao" class="form-control"
                                                 value="{{ old('dt_admissao') }}">
                                             @error('dt_admissao')
                                                 <div class="alert alert-danger">{{ $message }}</div>
                                             @enderror
                                         </div>
                                         <div class="mb-3">
                                             <label class="form-label">Jornada</label>
                                             <select class="select" name="jornada">
                                                 <option value="">Selecione</option>
                                                 <option value="1"
                                                     @if (old('jornada') == '1') selected @endif>A+</option>
                                                 <option value="2"
                                                     @if (old('jornada') == '2') selected @endif>O+</option>
                                                 <option value="3"
                                                     @if (old('jornada') == '3') selected @endif>B+</option>
                                                 <option value="4"
                                                     @if (old('jornada') == '4') selected @endif>AB+</option>
                                             </select>
                                             @error('jornada')
                                                 <div class="alert alert-danger">{{ $message }}</div>
                                             @enderror
                                         </div>
                                         <div class="mb-3">
                                             <label class="form-label">Telefone</label>
                                             <input type="text" name="telefone" class="form-control"
                                                 value="{{ old('telefone') }}">
                                             @error('telefone')
                                                 <div class="alert alert-danger">{{ $message }}</div>
                                             @enderror
                                         </div>
                                     </div>
                                     <div class="col-md-6">
                                         <div class="mb-3">
                                             <label class="form-label">CPF</label>
                                             <input type="text" name="cpf" class="form-control"
                                                 value="{{ old('cpf') }}">
                                             @error('cpf')
                                                 <div class="alert alert-danger">{{ $message }}</div>
                                             @enderror
                                         </div>
                                         <div class="mb-3">
                                             <label class="form-label">Cargo/Função</label>
                                             <input type="text" name="cargo" class="form-control"
                                                 value="{{ old('cargo') }}">
                                             @error('cargo')
                                                 <div class="alert alert-danger">{{ $message }}</div>
                                             @enderror
                                         </div>
                                         <div class="mb-3">
                                             <label class="form-label">Salário</label>
                                             <input type="text" name="salario" class="form-control"
                                                 value="{{ old('salario') }}">
                                             @error('salario')
                                                 <div class="alert alert-danger">{{ $message }}</div>
                                             @enderror
                                         </div>
                                         <div class="mb-3">
                                             <label class="d-block">Modalidade:</label>
                                             <div class="form-check form-check-inline">
                                                 <input class="form-check-input" type="radio" name="modalidade"
                                                     id="gender_male" value="contrato"
                                                     @if (old('modalidade') == 'contrato') checked @endif>
                                                 <label class="form-check-label" for="gender_male">Contrato</label>
                                             </div>
                                             <div class="form-check form-check-inline">
                                                 <input class="form-check-input" type="radio" name="modalidade"
                                                     id="gender_female" value="estágio"
                                                     @if (old('modalidade') == 'estágio') checked @endif>
                                                 <label class="form-check-label" for="gender_female">Estágio</label>
                                             </div>
                                             @error('modalidade')
                                                 <div class="alert alert-danger">{{ $message }}</div>
                                             @enderror
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