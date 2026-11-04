<div id="results-index-page" class="h-100 w-100 mb-5 mx-5" style="max-width: 1200px">
    <div class="w-100 m-auto">
        <div class="w-100 mt-3">
            <h2 class="m-0">Reports</h2>
            <p class="m-0 text-muted">Generate reports to summarize your data and findings.</p>
        </div>

        <div class="w-100 mt-5">
            <div class="d-flex justify-content-between">
                <div>
                    <h4 class="m-0">Configuration</h4>
                    <p class="text-muted">Select which documents and codes you want use when generating reports.</p>
                </div>
            </div>

            <div class="mb-3">
                <div class="form-group">
                    <label class="form-label">Show quotes for code</label>
                    <select class="form-control show-for">
                        <option value="top">Selected code only</option>
                        <option value="children">Selected code & direct children</option>
                        <option selected value="all">Selected code & all children</option>
                    </select>
                    <small class="form-text text-muted">
                        Works only if you select one or more codes bellow.
                    </small>
                </div>
            </div>

            <div class="mb-3">
                <div class="form-group mb-1">
                    <label class="form-label">Codes</label>
                    <select class="form-control select-codes" multiple="multiple"></select>
                    <small class="form-text text-muted">
                        Leave empty to show all.
                    </small>
                </div>

                <button type="button" class="btn btn-primary btn-sm btn-select-all">Select all</button>
                <button type="button" class="btn btn-danger btn-sm btn-clear-selection">Clear selection</button>
            </div>

            <div class="mb-3">
                <div class="form-group mb-1">
                    <label class="form-label">Documents</label>
                    <select class="form-control select-documents"></select>
                    <small class="form-text text-muted">
                        Leave empty to show all.
                    </small>
                </div>

                <button type="button" class="btn btn-primary btn-sm btn-select-all">Select all</button>
                <button type="button" class="btn btn-danger btn-sm btn-clear-selection">Clear selection</button>
            </div>

            <button type="button" class="btn btn-primary btn-generate-report">Generate/update report</button>
        </div>

        <div class="no-report-info">
            <hr>
            Nothing to show. Use the button above to generate the report
            <b>(your project must have at least one document and one code)</b>.
        </div>
    </div>

    <div class="w-100 m-auto report" style="display: none;">
        <hr>

        <div class="w-100 mt-3 mb-3">
            <h4 class="m-0">Report</h4>
            <p class="text-muted">Here are your findings.</p>
        </div>

        <ul class="nav nav-tabs" id="reportTabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#tab-tree" role="tab">Codes Tree</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab-relations" role="tab">Code Relations</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab-heatmap" role="tab">Quotes Heatmap</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab-quotes-per-code" role="tab">Quotes por Code</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab-codes-per-doc" role="tab">Codes por Documento</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab-chord" role="tab">Chord Diagram</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab-documents" role="tab">Documents</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab-codes" role="tab">Codes</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#tab-word-cloud" role="tab">Word Cloud</a>
            </li>
        </ul>

        <div class="tab-content border border-top-0 rounded-bottom p-3">

            <div class="tab-pane fade show active" id="tab-tree" role="tabpanel" style="min-height: calc(100vh - 300px)">
                <h5 class="mt-2 mb-1">Codes tree</h5>
                <p class="text-muted">Click a code to show/hide its children. Right click to edit/show related codes.</p>
                <div class="overflow-auto">
                    <div class="w-100 d-flex justify-content-end mb-2">
                        <button type="button" class="btn btn-sm btn-primary mr-2 download">Download SVG</button>
                        <button type="button" class="btn btn-sm btn-success mr-2 btn-expand-all">Expand all</button>
                        <button type="button" class="btn btn-sm btn-danger mr-2 btn-collapse-all">Collapse all</button>
                    </div>
                    <div id="tree-map" class="tree-map w-100"></div>
                </div>
            </div>

            <div class="tab-pane fade" id="tab-relations" role="tabpanel" style="min-height: calc(100vh - 300px)">
                <h5 class="mt-2 mb-1">Code Relations</h5>
                <p class="text-muted">Click a cell to see the related quotes. Shows codes that co-occur in the same quote.</p>
                <div class="overflow-auto">
                    <div class="code-relations-heatmap"></div>
                </div>
            </div>

            <div class="tab-pane fade" id="tab-heatmap" role="tabpanel" style="min-height: calc(100vh - 300px)">
                <h5 class="mt-2 mb-1">Quotes heatmap (documents x codes)</h5>
                <p class="text-muted">Click a cell to see the related quotes.</p>
                <div class="overflow-auto">
                    <div class="heatmap"></div>
                </div>
            </div>

            <div class="tab-pane fade" id="tab-quotes-per-code" role="tabpanel" style="min-height: calc(100vh - 300px)">
                <h5 class="mt-2 mb-1">Quotes por Code</h5>
                <p class="text-muted">Frequencia de cada code, ordenada do mais citado ao menos citado. Clique para ver as citacoes.</p>
                <div class="overflow-auto">
                    <div class="quotes-per-code-chart"></div>
                </div>
            </div>

            <div class="tab-pane fade" id="tab-codes-per-doc" role="tabpanel" style="min-height: calc(100vh - 300px)">
                <h5 class="mt-2 mb-1">Codes por Documento</h5>
                <p class="text-muted">Distribuicao de codes por entrevista. Cada segmento representa um code.</p>
                <div class="overflow-auto">
                    <div class="codes-per-doc-chart"></div>
                </div>
            </div>

            <div class="tab-pane fade" id="tab-chord" role="tabpanel" style="min-height: calc(100vh - 300px)">
                <h5 class="mt-2 mb-1">Chord Diagram</h5>
                <p class="text-muted">Co-ocorrencia de codes: quais codes aparecem juntos na mesma citacao.</p>
                <div class="chord-diagram" style="height: calc(100vh - 350px); min-height: 500px;"></div>
            </div>

            <div class="tab-pane fade" id="tab-documents" role="tabpanel" style="min-height: calc(100vh - 300px)">
                <h5 class="mt-2 mb-1">Selected Documents</h5>
                <button type="button" class="btn btn-primary btn-sm mb-3 btn-export-all-quotes-for-documents">
                    <i class="fas fa-download mr-1"></i> Export all quotes to .txt
                </button>
                <div class="table-responsive">
                    <table class="selected-documents-table table table-striped table-bordered table-hover w-100">
                        <thead>
                        <tr>
                            <th>Type</th>
                            <th>Document Name</th>
                            <th>Description</th>
                            <th>Quotes Count</th>
                            <th>Codes Count</th>
                            <th>Options</th>
                        </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <div class="selected-documents-table-options" style="display: none;">
                    <button type="button" class="btn btn-primary btn-sm btn-show-document-quotes">
                        <i class="fas fa-code mr-1"></i> Quotes
                    </button>
                </div>
            </div>

            <div class="tab-pane fade" id="tab-codes" role="tabpanel" style="min-height: calc(100vh - 300px)">
                <h5 class="mt-2 mb-1">Selected Codes</h5>
                <button type="button" class="btn btn-primary btn-sm mb-3 btn-export-all-quotes-for-codes">
                    <i class="fas fa-download mr-1"></i> Export all quotes to .txt
                </button>
                <div class="table-responsive">
                    <table class="selected-codes-table table table-striped table-bordered table-hover w-100">
                        <thead>
                        <tr>
                            <th>Color</th>
                            <th>Code Name</th>
                            <th>Brief Description</th>
                            <th>Full Description</th>
                            <th>Quotes Count</th>
                            <th>Documents Count</th>
                            <th>Options</th>
                        </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                <div class="selected-codes-table-options" style="display: none;">
                    <button type="button" class="btn btn-primary btn-sm btn-show-code-quotes">
                        <i class="fas fa-code mr-1"></i> Quotes
                    </button>
                </div>
            </div>

            <div class="tab-pane fade" id="tab-word-cloud" role="tabpanel" style="min-height: calc(100vh - 300px)">
                <div class="word-cloud-container">
                    <h5 class="mt-2 mb-1">Quotes word cloud</h5>
                    <div class="mb-3">
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="form-group">
                                    <label>Excluded words</label>
                                    <select class="form-control select-exclude-words" multiple="multiple"></select>
                                    <small class="form-text text-muted">
                                        To add a new word type it and press the 'Enter' key.
                                    </small>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="form-group">
                                    <label>Words to display</label>
                                    <input type="number" class="form-control words-to-display" step="1" min="1" value="100">
                                    <small class="form-text text-muted">
                                        Leave it blank to show as many as possible.
                                    </small>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="form-group">
                                    <label>Minimum word value</label>
                                    <input type="number" class="form-control min-word-value" step="1" min="1" value="3">
                                    <small class="form-text text-muted">
                                        Minimum occurrences of a word for it to be displayed. Min value: 1.
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div class="w-100">
                            <button type="button" class="btn btn-primary btn-update-word-cloud-graph">Update filters</button>
                        </div>
                    </div>
                    <div class="word-cloud w-100" style="height: 500px;"></div>
                </div>

                <hr>

                <div class="mt-3">
                    <h5 class="mb-1">Codes word cloud</h5>
                    <p class="text-muted">See which codes where used most frequently.</p>
                    <div class="codes-word-cloud w-100" style="height: 500px;"></div>
                </div>
            </div>

        </div>
    </div>
</div>

<script>
    document.addEventListener('shown.bs.tab', function () {
        window.dispatchEvent(new Event('resize'));
    });
</script>
