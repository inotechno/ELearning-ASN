<div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <iframe width="100%" height="800px" src="{{ $generate_certificate_url }}#view=fit&toolbar=0&navpanes=0&scrollbar=0" frameborder="0"></iframe>

                    <div class="text-center">
                        <a href="{{ $download_certificate_url }}" target="_blank" wire:target="certificate_url" wire:loading.attr="disabled"
                            class="btn btn-primary">Download</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
