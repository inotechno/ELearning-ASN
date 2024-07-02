<div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <iframe width="100%" height="800px" src="{{ $certificate_url }}" frameborder="0"></iframe>

                    <div class="text-center">
                        <a href="{{ $certificate_url }}" wire:target="certificate_url" wire:loading.attr="disabled"
                            class="btn btn-primary">Download</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
