 @csrf
 <div class="mb-3">
     <label for="name" class="form-label">Name</label>
     <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
         placeholder="Enter your name" autofocus value="{{ old('name') }}" aria-describedby="name" />
     @error('name')
         <span class="invalid-feedback" role="alert">{{ $message }}</span>
     @enderror
 </div>
 <div class="mb-3">
     <label for="email" class="form-label">Email</label>
     <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
         placeholder="Enter your email" value="{{ old('email') }}" aria-describedby="email" />
     @error('email')
         <span class="invalid-feedback" role="alert">{{ $message }}</span>
     @enderror
 </div>
 <div class="mb-3 form-password-toggle">
     <label class="form-label" for="password">Password</label>
     <div class="input-group input-group-merge">
         <input type="password" id="password" class="form-control @error('password') is-invalid @enderror"
             name="password" placeholder="......" aria-describedby="password" />
         <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
         @error('password')
             <span class="invalid-feedback" role="alert">{{ $message }}</span>
         @enderror
     </div>
 </div>
 <div class="mb-3">
     <label class="form-label" for="password">Roles</label>
     <div class="input-group input-group-merge">
         @foreach ($roles as $role)
             <div class="d-flex">
                 <input type="checkbox" class="form-check @error('roles') is-invalid @enderror" name="roles[]"
                     value="{{ $role->id }}" id="{{ $role->name }}" />
                 <label for="{{ $role->name }}" class="ms-3">{{ $role->name }}</label>

                 @error('roles')
                     <span class="invalid-feedback" role="alert">{{ $message }}</span>
                 @enderror
             </div>
         @endforeach
     </div>
 </div>
 <button class="btn btn-primary d-grid w-50" type="submit">Submit</button>
