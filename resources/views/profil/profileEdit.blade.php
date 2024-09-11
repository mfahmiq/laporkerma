<x-layouts>
  <div class="container-fluid mt-5">
      <div class="card shadow-lg">
          <div class="card-body">
              <div class="text-center mb-3">
                <a href="#">
                  <img src="https://via.placeholder.com/150" class="rounded-circle" alt="Profile Picture">
              </a>              
              </div>
              <form>
                  <div class="mb-3">
                      <label for="name" class="form-label fw-bold">Nama:</label>
                      <input type="text" class="form-control" id="name">
                  </div>
                  <div class="mb-3">
                      <label for="email" class="form-label fw-bold">Email:</label>
                      <input type="email" class="form-control" id="email">
                  </div>
                  <div class="mb-3">
                      <label for="password" class="form-label fw-bold">Password:</label>
                      <input type="password" class="form-control" id="password" placeholder="********">
                  </div>
                  <button type="submit" class="btn btn-primary">Save changes</button>
              </form>
          </div>
      </div>
  </div>
</x-layouts>
