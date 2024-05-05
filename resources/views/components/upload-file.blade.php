
 </style>
 <div class="profile-pic-upload flex-column align-items-start mt-2">
     <label for="doc_anexo" class="profile-pic w-100 w-100 border-container" style="cursor: pointer"
         id="anexo-label">
         <i data-feather="upload" class="m-2"></i> Clique para anexar
     </label>
     <input type="file" class="form-control d-none @error('doc_anexo') is-invalid @enderror" id="doc_anexo"
         name="doc_anexo" onchange="handleFileUpload(this)">
     <small class="text-muted" id="anexo-size">Nenhum arquivo selecionado.</small>
     @error('doc_anexo')
         <div class="invalid-feedback"><i class="fa fa-exclamation-circle"></i>
             {{ $message }}</div>
     @enderror
 </div>




