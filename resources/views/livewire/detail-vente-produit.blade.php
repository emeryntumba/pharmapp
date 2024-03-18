<div>
    @if ($modalVisible)
    <div class="modal fade" id="Modal3" tabindex="-1" aria-labelledby="Modal Transac" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"></h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                    <div class="d-flex align-items-stretch">
                        <div class="card w-100">
                          <div class="card-body p-4">
                            <div class="mb-4">
                              <h5 class="card-title fw-semibold">Mouvement Récents</h5>
                            </div>
                            <ul class="timeline-widget mb-0 position-relative mb-n5">
                              <li class="timeline-item d-flex position-relative overflow-hidden">
                                <div class="timeline-time text-dark flex-shrink-0 text-end">09:30</div>
                                <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                                  <span class="timeline-badge border-2 border border-primary flex-shrink-0 my-8"></span>
                                  <span class="timeline-badge-border d-block flex-shrink-0"></span>
                                </div>
                                <div class="timeline-desc fs-3 text-dark mt-n1">Payment received from John Doe of $385.90</div>
                              </li>
                              <li class="timeline-item d-flex position-relative overflow-hidden">
                                <div class="timeline-time text-dark flex-shrink-0 text-end">10:00 am</div>
                                <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                                  <span class="timeline-badge border-2 border border-info flex-shrink-0 my-8"></span>
                                  <span class="timeline-badge-border d-block flex-shrink-0"></span>
                                </div>
                                <div class="timeline-desc fs-3 text-dark mt-n1 fw-semibold">New sale recorded <a
                                    href="javascript:void(0)" class="text-primary d-block fw-normal">#ML-3467</a>
                                </div>
                              </li>
                              <li class="timeline-item d-flex position-relative overflow-hidden">
                                <div class="timeline-time text-dark flex-shrink-0 text-end">12:00 am</div>
                                <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                                  <span class="timeline-badge border-2 border border-success flex-shrink-0 my-8"></span>
                                  <span class="timeline-badge-border d-block flex-shrink-0"></span>
                                </div>
                                <div class="timeline-desc fs-3 text-dark mt-n1">Payment was made of $64.95 to Michael</div>
                              </li>
                              <li class="timeline-item d-flex position-relative overflow-hidden">
                                <div class="timeline-time text-dark flex-shrink-0 text-end">09:30 am</div>
                                <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                                  <span class="timeline-badge border-2 border border-warning flex-shrink-0 my-8"></span>
                                  <span class="timeline-badge-border d-block flex-shrink-0"></span>
                                </div>
                                <div class="timeline-desc fs-3 text-dark mt-n1 fw-semibold">New sale recorded <a
                                    href="javascript:void(0)" class="text-primary d-block fw-normal">#ML-3467</a>
                                </div>
                              </li>
                              <li class="timeline-item d-flex position-relative overflow-hidden">
                                <div class="timeline-time text-dark flex-shrink-0 text-end">09:30 am</div>
                                <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                                  <span class="timeline-badge border-2 border border-danger flex-shrink-0 my-8"></span>
                                  <span class="timeline-badge-border d-block flex-shrink-0"></span>
                                </div>
                                <div class="timeline-desc fs-3 text-dark mt-n1 fw-semibold">New arrival recorded
                                </div>
                              </li>
                              <li class="timeline-item d-flex position-relative overflow-hidden">
                                <div class="timeline-time text-dark flex-shrink-0 text-end">12:00 am</div>
                                <div class="timeline-badge-wrap d-flex flex-column align-items-center">
                                  <span class="timeline-badge border-2 border border-success flex-shrink-0 my-8"></span>
                                </div>
                                <div class="timeline-desc fs-3 text-dark mt-n1">Payment Done</div>
                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>


            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="button" class="btn btn-primary">Save changes</button>
            </div>
          </div>
        </div>
      </div>

    </div>
    @endif
</div>
