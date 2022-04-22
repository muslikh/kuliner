<!doctype html>

<html lang="en">
    @include('components.templates.partials.head')

  <body >
    <div class="page">

    @include('components.templates.partials.sidebar')

      <div class="page-wrapper">
        <div class="container-xl">
          <!-- Page title -->
          <div class="page-header d-print-none">
            <div class="row align-items-center">
              <div class="col">
                <!-- Page pre-title -->
                <div class="page-pretitle">

                </div>
                <h2 class="page-title">
                  {{ $title ?? 'Dashboard'}}
                </h2>
              </div>
            </div>
          </div>
        </div>
        <div class="page-body">
          <div class="container-xl">
            <div class="row row-deck row-cards">

                <x-forms.alert/>

                {{ $slot}}


            </div>

            <div class="modal modal-blur fade" id="modal-logout" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-sm modal-dialog-centered" role="document">
                  <div class="modal-content">
                    <div class="modal-body">
                      <div class="modal-title">Logout</div>
                      <div>Are you sure to end this session. ??</div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-link link-secondary me-auto" data-bs-dismiss="modal">Cancel</button>
                      <button type="button" class="btn btn-danger"  id="logout" data-bs-dismiss="modal">Logout</button>
                    </div>
                  </div>
                </div>
              </div>

          </div>
        </div>

        @include('components.templates.partials.footer')
      </div>
    </div>

    @include('components.templates.partials.scripts')
  </body>
</html>
