<div class="d-flex justify-content-center">
    <div class="col-12 col-lg-8 col-xl-6">
        <div class="container" style="margin-bottom: 8rem;">
            <div class="app-container py-5">
                <div class="row d-flex justify-content-center">
                    <div class="col-12">
                        <div class="text-start">
                            <span class="me-auto f-monserat title-top-navbar"><?= $_SESSION["currency"] ?> - Add /
                                Receive fund - Cash</span>
                        </div>
                    </div>
                    <div class="col-12 infobank-list-app my-4">
                        <div class="py-4">
                            <p>
                                Those who want to make a bank transfer without a current account can go to the bank and
                                ask to make a transfer by paying the necessary money directly at the counter. This is
                                the cash transfer. Wire transfer is a transfer of money to a beneficiary bank account.
                                The transfer can still be made, but the ordering party will have to go to the bank
                                counter, it is obviously not possible to do it online as there is no account from which
                                to transfer the sum, and bring the cash needed for the transaction.
                            </p>
                            <div class="accordion" id="accordionFreedy">
                                <div class="accordion-item freedy-accordion-item mb-5">
                                    <h2 class="accordion-header m-0" id="pageOne">
                                        <button id="btnaccorionOne"
                                            class="accordion-button freedy-accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseOne"
                                            aria-expanded="false" aria-controls="collapseOne">
                                            <div class="box-title-accordion ms-auto text-center">
                                                <span class="head" style="font-size: 16px;">Bank Transfer Without
                                                    Current Account</span>
                                                <span class="small" id="seemoreOne" style="font-size: 12px;">See
                                                    more</span>
                                            </div>
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="pageOne"
                                        data-bs-parent="#accordionFreedy">
                                        <div class="accordion-body freedy-accordion-body p-3 p-lg-5">
                                            <p>
                                                The procedure is very simple, you go to a bank counter, collect the
                                                appropriate form that the institution makes available to the customer to
                                                make a transfer.<br>
                                                The form must indicate the sender identification details in the
                                                appropriate spaces, as well as the amount to be credited to the account
                                                of a third party, the identification details of the beneficiary, its
                                                Iban code, as well as the reason, i.e. the reason for transfer money.
                                            </p>
                                            <p>
                                                We hand over the form to the bank official. He verifies that all the
                                                mandatory data have been entered, even if he cannot guarantee their
                                                correctness, it being our duty and interest to make sure that they are
                                                the right ones. At this point, we will sign the form and deliver the
                                                money needed for the transfer, as well as the amount due as a
                                                commission, the amount of which varies from bank to bank. The official
                                                will process the request. The bank will credit the bank account of the
                                                beneficiary indicated by us within the expected times, depending on the
                                                type of transfer
                                                We must remember that often the costs associated with this type of
                                                operation are higher than those of a normal bank transfer.

                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item freedy-accordion-item mb-5">
                                    <h2 class="accordion-header m-0" id="pageTwo">
                                        <button id="btnaccorionTwo"
                                            class="accordion-button freedy-accordion-button collapsed" type="button"
                                            data-bs-toggle="collapse" data-bs-target="#collapseTwo"
                                            aria-expanded="false" aria-controls="collapseTwo">
                                            <div class="box-title-accordion ms-auto text-center">
                                                <span class="head" style="font-size: 16px;">Postal transfer in
                                                    cash</span>
                                                <span class="small" id="seemoreTwo" style="font-size: 12px;">See
                                                    more</span>
                                            </div>
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="pageTwo"
                                        data-bs-parent="#accordionFreedy">
                                        <div class="accordion-body freedy-accordion-body p-3 p-lg-5">
                                            <p>It is also possible to make a cash postal transfer by going to any of the
                                                Italian Post Offices.
                                                In this case they are needed
                                            </p>
                                            <ul>
                                                <li>The cash you want to transfer.</li>
                                                <li>An identification document</li>
                                                <li>The data of the beneficiary</li>
                                                <li>Your tax code</li>
                                                <li>The identification code of the bank current account that will
                                                    receive the money</li>
                                            </ul>
                                            <p>The procedure is similar to the one explained above. You must contact the
                                                post office, have the form for the postal transfer delivered to you,
                                                fill it in and deliver it together with the cash to the operator at the
                                                counter.<br>
                                                Once the money has been delivered, a receipt of the money transfer to
                                                the bank current account that we have indicated is delivered.<br>
                                                The postal transfer from the cash desk has a cost, for customers and
                                                non-customers.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <p>ATTENTION:</p>
                                <p>CASH TRANSFER LIMITS AND COSTS VARY FROM INSTITUTE TO INSTITUTE AND FROM COUNTRY TO
                                    COUNTRY ACCORDING TO APPLICABLE LAW.</p>
                                <p>The procedure is applicable only internally to the SEPA system.</p>
                                <p>Use SEPA add/receive bank details</p>
                                <p>ATTENTION</p>
                                <p>REMEMBER TO WRITE THE REASON CORRECTLY WITHOUT ADDING OR OMITTING CHARACTERS.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 infobank-list-app mt-4 input-piggy-style">
                        <div class="py-4">
                            <div class="row">
                                <label>Account Holder</label>
                                <div class="d-flex flex-row align-items-center mb-3">
                                    <input class="form-control me-2" type="text" name="" id="inter1"
                                        value="<?= @$bank->name_circuit ?>" readonly>
                                    <a class="btn btn-copy" id="btninter1">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10.5 2.0028C9.82495 2.01194 9.4197 2.05103 9.09202 2.21799C8.71569 2.40973 8.40973 2.71569 8.21799 3.09202C8.05103 3.4197 8.01194 3.82495 8.0028 4.5M19.5 2.0028C20.1751 2.01194 20.5803 2.05103 20.908 2.21799C21.2843 2.40973 21.5903 2.71569 21.782 3.09202C21.949 3.4197 21.9881 3.82494 21.9972 4.49999M21.9972 13.5C21.9881 14.175 21.949 14.5803 21.782 14.908C21.5903 15.2843 21.2843 15.5903 20.908 15.782C20.5803 15.949 20.1751 15.9881 19.5 15.9972M22 7.99999V9.99999M14.0001 2H16M5.2 22H12.8C13.9201 22 14.4802 22 14.908 21.782C15.2843 21.5903 15.5903 21.2843 15.782 20.908C16 20.4802 16 19.9201 16 18.8V11.2C16 10.0799 16 9.51984 15.782 9.09202C15.5903 8.71569 15.2843 8.40973 14.908 8.21799C14.4802 8 13.9201 8 12.8 8H5.2C4.0799 8 3.51984 8 3.09202 8.21799C2.71569 8.40973 2.40973 8.71569 2.21799 9.09202C2 9.51984 2 10.0799 2 11.2V18.8C2 19.9201 2 20.4802 2.21799 20.908C2.40973 21.2843 2.71569 21.5903 3.09202 21.782C3.51984 22 4.07989 22 5.2 22Z"
                                                stroke="#CB0000" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <label>IBAN</label>
                                <div class="d-flex flex-row align-items-center mb-3">
                                    <input class="form-control me-2" type="text" name="" id="inter2"
                                        value="<?= @$bank->number_circuit ?>" readonly>
                                    <a class="btn btn-copy" id="btninter2">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10.5 2.0028C9.82495 2.01194 9.4197 2.05103 9.09202 2.21799C8.71569 2.40973 8.40973 2.71569 8.21799 3.09202C8.05103 3.4197 8.01194 3.82495 8.0028 4.5M19.5 2.0028C20.1751 2.01194 20.5803 2.05103 20.908 2.21799C21.2843 2.40973 21.5903 2.71569 21.782 3.09202C21.949 3.4197 21.9881 3.82494 21.9972 4.49999M21.9972 13.5C21.9881 14.175 21.949 14.5803 21.782 14.908C21.5903 15.2843 21.2843 15.5903 20.908 15.782C20.5803 15.949 20.1751 15.9881 19.5 15.9972M22 7.99999V9.99999M14.0001 2H16M5.2 22H12.8C13.9201 22 14.4802 22 14.908 21.782C15.2843 21.5903 15.5903 21.2843 15.782 20.908C16 20.4802 16 19.9201 16 18.8V11.2C16 10.0799 16 9.51984 15.782 9.09202C15.5903 8.71569 15.2843 8.40973 14.908 8.21799C14.4802 8 13.9201 8 12.8 8H5.2C4.0799 8 3.51984 8 3.09202 8.21799C2.71569 8.40973 2.40973 8.71569 2.21799 9.09202C2 9.51984 2 10.0799 2 11.2V18.8C2 19.9201 2 20.4802 2.21799 20.908C2.40973 21.2843 2.71569 21.5903 3.09202 21.782C3.51984 22 4.07989 22 5.2 22Z"
                                                stroke="#CB0000" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <label>Swift</label>
                                <div class="d-flex flex-row align-items-center mb-3">
                                    <input class="form-control me-2" type="text" name="routing_circuit" id="inter3"
                                        value="<?= @$bank->routing_circuit ?>" readonly>
                                    <a class="btn btn-copy" id="btninter3">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10.5 2.0028C9.82495 2.01194 9.4197 2.05103 9.09202 2.21799C8.71569 2.40973 8.40973 2.71569 8.21799 3.09202C8.05103 3.4197 8.01194 3.82495 8.0028 4.5M19.5 2.0028C20.1751 2.01194 20.5803 2.05103 20.908 2.21799C21.2843 2.40973 21.5903 2.71569 21.782 3.09202C21.949 3.4197 21.9881 3.82494 21.9972 4.49999M21.9972 13.5C21.9881 14.175 21.949 14.5803 21.782 14.908C21.5903 15.2843 21.2843 15.5903 20.908 15.782C20.5803 15.949 20.1751 15.9881 19.5 15.9972M22 7.99999V9.99999M14.0001 2H16M5.2 22H12.8C13.9201 22 14.4802 22 14.908 21.782C15.2843 21.5903 15.5903 21.2843 15.782 20.908C16 20.4802 16 19.9201 16 18.8V11.2C16 10.0799 16 9.51984 15.782 9.09202C15.5903 8.71569 15.2843 8.40973 14.908 8.21799C14.4802 8 13.9201 8 12.8 8H5.2C4.0799 8 3.51984 8 3.09202 8.21799C2.71569 8.40973 2.40973 8.71569 2.21799 9.09202C2 9.51984 2 10.0799 2 11.2V18.8C2 19.9201 2 20.4802 2.21799 20.908C2.40973 21.2843 2.71569 21.5903 3.09202 21.782C3.51984 22 4.07989 22 5.2 22Z"
                                                stroke="#CB0000" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <label>Causal</label>
                                <div class="d-flex flex-row align-items-center mb-3">
                                    <input class="form-control me-2" type="text" name="" id="inter4"
                                        value="Topup <?= $_SESSION["ucode"] ?>" readonly>
                                    <a class="btn btn-copy" id="btninter4">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10.5 2.0028C9.82495 2.01194 9.4197 2.05103 9.09202 2.21799C8.71569 2.40973 8.40973 2.71569 8.21799 3.09202C8.05103 3.4197 8.01194 3.82495 8.0028 4.5M19.5 2.0028C20.1751 2.01194 20.5803 2.05103 20.908 2.21799C21.2843 2.40973 21.5903 2.71569 21.782 3.09202C21.949 3.4197 21.9881 3.82494 21.9972 4.49999M21.9972 13.5C21.9881 14.175 21.949 14.5803 21.782 14.908C21.5903 15.2843 21.2843 15.5903 20.908 15.782C20.5803 15.949 20.1751 15.9881 19.5 15.9972M22 7.99999V9.99999M14.0001 2H16M5.2 22H12.8C13.9201 22 14.4802 22 14.908 21.782C15.2843 21.5903 15.5903 21.2843 15.782 20.908C16 20.4802 16 19.9201 16 18.8V11.2C16 10.0799 16 9.51984 15.782 9.09202C15.5903 8.71569 15.2843 8.40973 14.908 8.21799C14.4802 8 13.9201 8 12.8 8H5.2C4.0799 8 3.51984 8 3.09202 8.21799C2.71569 8.40973 2.40973 8.71569 2.21799 9.09202C2 9.51984 2 10.0799 2 11.2V18.8C2 19.9201 2 20.4802 2.21799 20.908C2.40973 21.2843 2.71569 21.5903 3.09202 21.782C3.51984 22 4.07989 22 5.2 22Z"
                                                stroke="#CB0000" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <label>Company Address</label>
                                <div class="d-flex flex-row align-items-center mb-3">
                                    <input class="form-control me-2" type="text" name="" id="inter6"
                                        value="<?= @$bank->address_circuit ?>" readonly>
                                    <a class="btn btn-copy" id="btninter6">
                                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M10.5 2.0028C9.82495 2.01194 9.4197 2.05103 9.09202 2.21799C8.71569 2.40973 8.40973 2.71569 8.21799 3.09202C8.05103 3.4197 8.01194 3.82495 8.0028 4.5M19.5 2.0028C20.1751 2.01194 20.5803 2.05103 20.908 2.21799C21.2843 2.40973 21.5903 2.71569 21.782 3.09202C21.949 3.4197 21.9881 3.82494 21.9972 4.49999M21.9972 13.5C21.9881 14.175 21.949 14.5803 21.782 14.908C21.5903 15.2843 21.2843 15.5903 20.908 15.782C20.5803 15.949 20.1751 15.9881 19.5 15.9972M22 7.99999V9.99999M14.0001 2H16M5.2 22H12.8C13.9201 22 14.4802 22 14.908 21.782C15.2843 21.5903 15.5903 21.2843 15.782 20.908C16 20.4802 16 19.9201 16 18.8V11.2C16 10.0799 16 9.51984 15.782 9.09202C15.5903 8.71569 15.2843 8.40973 14.908 8.21799C14.4802 8 13.9201 8 12.8 8H5.2C4.0799 8 3.51984 8 3.09202 8.21799C2.71569 8.40973 2.40973 8.71569 2.21799 9.09202C2 9.51984 2 10.0799 2 11.2V18.8C2 19.9201 2 20.4802 2.21799 20.908C2.40973 21.2843 2.71569 21.5903 3.09202 21.782C3.51984 22 4.07989 22 5.2 22Z"
                                                stroke="#CB0000" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round" />
                                        </svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="navbar-app fixed-bottom d-flex justify-content-center">
    <div class="col-12 col-sm-8 col-xl-6 box-navbar-freedy d-flex justify-content-start align-items-center">
        <a href="<?= base_url() ?>receive" class="d-flex align-items-center border-0">
            <div class="icon-menus d-flex align-items-center home-svg">
                <svg width="41" height="35" viewBox="0 0 41 35" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect width="41" height="35" fill="url(#paint0_linear_30_4821)" />
                    <path d="M32.4584 17.5236H8.54175" stroke="white" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" />
                    <path d="M20.5001 27.7338L8.54175 17.5245L20.5001 7.31531" stroke="white" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" />
                    <defs>
                        <linearGradient id="paint0_linear_30_4821" x1="20.5" y1="0" x2="20.5" y2="35"
                            gradientUnits="userSpaceOnUse">
                            <stop stop-color="#8B0000" />
                            <stop offset="1" stop-color="#CB0000" />
                        </linearGradient>
                    </defs>
                </svg>
            </div>
        </a>
    </div>
</div>