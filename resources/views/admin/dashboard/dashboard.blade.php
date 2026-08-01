@extends('layouts.admin')
@push('title', get_phrase('Admins'))
@push('meta')
@endpush
@push('css')
<style>
 

.table td, .table th {
  vertical-align: middle;
}
.text-success {
  color: #00b84a !important;
}
.text-danger {
  color: #e74c3c !important;
}
.textTitle{
    font-size: 20px;
    font-weight: 600;
    color: #242D47;
}
.table > thead {
	border-bottom: 1px solid #e3e3e3ad;
}
.table th ,
.table td {
    font-size: 14px;
    font-weight: 500;
    color: #242D47;
}
.table th {
    font-weight: 600;
}
.table td .text-muted {
    font-size: 12px;
    color: #6D718C !important;
    font-weight: 400;
    margin-top: 6px;
}
#worldMap{
    width: 100%;
    height: 200px;
}
.list-group-item span{
    font-size: 14px;
    font-weight: 500;
    color: #4B5574;
}
.chart-card{
    height: 380px;
}
.balance-card{
    background: #1b84ff;
    height: 380px;
}
.list-group {
    max-height: 300px;
    overflow-y: auto;    
    padding-right: 5px;  
}
.blanceText h5{
    font-size: 20px;
    font-weight: 600;
}
.blanceText p{
    line-height: 26px;
    font-size: 14px;
    font-weight: 400;
}
.blanceText h2 {
	font-size: 40px;
	font-weight: 600;
	margin-top: 18px;
}
.text-16{
    font-size: 16px;
}
</style>
@endpush

@section('content')
<div class="mt-2">
    <div class="ol-card-body">
        <div class="row g-3">
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="stats-card s_box position-relative">
                    <div class="d-flex align-items-center">
                        <div class="icon-box">
                            <svg width="22" height="18" viewBox="0 0 20 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.75 4C7.682 4 6 5.682 6 7.75C6 9.818 7.682 11.5 9.75 11.5C11.818 11.5 13.5 9.818 13.5 7.75C13.5 5.682 11.818 4 9.75 4ZM9.75 10C8.509 10 7.5 8.991 7.5 7.75C7.5 6.509 8.509 5.5 9.75 5.5C10.991 5.5 12 6.509 12 7.75C12 8.991 10.991 10 9.75 10ZM15.75 0H3.75C1.332 0 0 1.332 0 3.75V11.75C0 14.168 1.332 15.5 3.75 15.5H15.75C18.168 15.5 19.5 14.168 19.5 11.75V3.75C19.5 1.332 18.168 0 15.75 0ZM18 11.75C18 13.327 17.327 14 15.75 14H3.75C2.173 14 1.5 13.327 1.5 11.75V3.75C1.5 2.173 2.173 1.5 3.75 1.5H15.75C17.327 1.5 18 2.173 18 3.75V11.75ZM4.75 7.75C4.75 8.302 4.302 8.75 3.75 8.75C3.198 8.75 2.75 8.302 2.75 7.75C2.75 7.198 3.198 6.75 3.75 6.75C4.302 6.75 4.75 7.198 4.75 7.75ZM16.75 7.75C16.75 8.302 16.302 8.75 15.75 8.75C15.198 8.75 14.75 8.302 14.75 7.75C14.75 7.198 15.198 6.75 15.75 6.75C16.302 6.75 16.75 7.198 16.75 7.75Z" fill="white"/>
                            </svg>
                        </div>
                        <div class="stats-info">
                            <p class="stats-title">{{get_phrase('Total Earning')}}</p>
                            <p class="stats-value">{{ currency($balance) }}</p>
                        </div>
                    </div>
                    <p class="stats-change">
                        <svg width="15" height="9" viewBox="0 0 15 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.6119 0.5C9.6119 0.223858 9.83576 0 10.1119 0H13.8333C14.1095 0 14.3333 0.223858 14.3333 0.5V4.19722C14.3333 4.47337 14.1095 4.69722 13.8333 4.69722C13.5572 4.69722 13.3333 4.47337 13.3333 4.19722V1.70191L9.24277 5.76753C8.93014 6.0783 8.66066 6.34616 8.41594 6.53181C8.15361 6.73082 7.86215 6.88136 7.50334 6.88132C7.14454 6.88128 6.85311 6.73067 6.59083 6.5316C6.34615 6.34589 6.07675 6.07798 5.76419 5.76715L5.58135 5.58534C5.23858 5.2445 5.01635 5.02501 4.8313 4.88458C4.65781 4.75292 4.57671 4.73823 4.52299 4.73825C4.46928 4.73827 4.38819 4.75301 4.2148 4.8848C4.02985 5.02537 3.80778 5.24502 3.46526 5.58611L0.852811 8.18763C0.65714 8.38248 0.340559 8.38182 0.145706 8.18615C-0.0491461 7.99048 -0.0484825 7.67389 0.147188 7.47904L2.78289 4.85436C3.09551 4.54302 3.36495 4.27468 3.60968 4.08866C3.87201 3.88927 4.16357 3.73838 4.52263 3.73825C4.88169 3.73812 5.17336 3.8888 5.43583 4.088C5.6807 4.27383 5.95034 4.54197 6.26318 4.85309L6.44602 5.0349C6.78849 5.37544 7.01052 5.59473 7.1954 5.73505C7.36872 5.8666 7.44977 5.88131 7.50346 5.88132C7.55715 5.88133 7.6382 5.86663 7.81155 5.73512C7.99646 5.59484 8.21854 5.37561 8.56109 5.03515L12.621 1H10.1119C9.83576 1 9.6119 0.776142 9.6119 0.5Z" fill="#29CCB0"/>
                        </svg>
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="stats-card s_box position-relative">
                    <div class="d-flex align-items-center">
                        <div class="icon-box two">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.75 14C13.75 14.414 13.414 14.75 13 14.75H7C6.586 14.75 6.25 14.414 6.25 14C6.25 13.586 6.586 13.25 7 13.25H13C13.414 13.25 13.75 13.586 13.75 14ZM10 16.25H7C6.586 16.25 6.25 16.586 6.25 17C6.25 17.414 6.586 17.75 7 17.75H10C10.414 17.75 10.75 17.414 10.75 17C10.75 16.586 10.414 16.25 10 16.25ZM21.75 11.5V19C21.75 20.517 20.517 21.75 19 21.75H6C3.582 21.75 2.25 20.418 2.25 18V6C2.25 3.582 3.582 2.25 6 2.25H14C16.418 2.25 17.75 3.582 17.75 6V9.25H19.5C20.741 9.25 21.75 10.259 21.75 11.5ZM16.551 20.25C16.359 19.875 16.25 19.45 16.25 19V6C16.25 4.423 15.577 3.75 14 3.75H6C4.423 3.75 3.75 4.423 3.75 6V18C3.75 19.577 4.423 20.25 6 20.25H16.551ZM20.25 11.5C20.25 11.086 19.914 10.75 19.5 10.75H17.75V19C17.75 19.689 18.311 20.25 19 20.25C19.689 20.25 20.25 19.689 20.25 19V11.5ZM7.633 9.10596L8.56201 9.34595C8.71501 9.38595 8.82202 9.53596 8.82202 9.70996C8.82202 9.84996 8.75403 9.94106 8.71503 9.98206C8.67103 10.0281 8.59501 10.083 8.48901 10.083H8.08398C7.91798 10.083 7.77299 9.93695 7.75299 9.75195C7.70799 9.33995 7.34303 9.04304 6.92603 9.08704C6.51403 9.13104 6.21699 9.50194 6.26099 9.91394C6.34199 10.6659 6.85201 11.2661 7.52301 11.4871V11.5C7.52301 11.914 7.85901 12.25 8.27301 12.25C8.68701 12.25 9.02301 11.914 9.02301 11.5V11.493C9.31001 11.403 9.57501 11.25 9.79401 11.024C10.134 10.67 10.321 10.2041 10.321 9.71106C10.321 8.85506 9.75403 8.10902 8.93903 7.89502L8.00897 7.65503C7.91897 7.63103 7.86097 7.57398 7.82397 7.52698C7.77697 7.46498 7.74902 7.37902 7.74902 7.29102C7.74902 7.08502 7.89797 6.91699 8.08197 6.91699H8.487C8.655 6.91699 8.79799 7.05905 8.81799 7.24805C8.86199 7.66005 9.22402 7.95396 9.64502 7.91296C10.057 7.86896 10.354 7.49806 10.31 7.08606C10.228 6.32506 9.70597 5.71998 9.02197 5.50598V5.50098C9.02197 5.08698 8.68597 4.75098 8.27197 4.75098C7.85797 4.75098 7.52197 5.08698 7.52197 5.50098V5.51599C6.78597 5.75899 6.24902 6.45802 6.24902 7.29102C6.24902 7.70602 6.38401 8.11203 6.62701 8.43103C6.87701 8.76203 7.233 9.00196 7.633 9.10596Z" fill="white"/>
                             </svg>
                        </div>
                        <div class="stats-info">
                            <p class="stats-title">{{get_phrase('Total Products')}}</p>
                            <p class="stats-value">{{$totalProduct}}</p>
                        </div>
                    </div>
                    <p class="stats-change">
                        <svg width="15" height="9" viewBox="0 0 15 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.6119 0.5C9.6119 0.223858 9.83576 0 10.1119 0H13.8333C14.1095 0 14.3333 0.223858 14.3333 0.5V4.19722C14.3333 4.47337 14.1095 4.69722 13.8333 4.69722C13.5572 4.69722 13.3333 4.47337 13.3333 4.19722V1.70191L9.24277 5.76753C8.93014 6.0783 8.66066 6.34616 8.41594 6.53181C8.15361 6.73082 7.86215 6.88136 7.50334 6.88132C7.14454 6.88128 6.85311 6.73067 6.59083 6.5316C6.34615 6.34589 6.07675 6.07798 5.76419 5.76715L5.58135 5.58534C5.23858 5.2445 5.01635 5.02501 4.8313 4.88458C4.65781 4.75292 4.57671 4.73823 4.52299 4.73825C4.46928 4.73827 4.38819 4.75301 4.2148 4.8848C4.02985 5.02537 3.80778 5.24502 3.46526 5.58611L0.852811 8.18763C0.65714 8.38248 0.340559 8.38182 0.145706 8.18615C-0.0491461 7.99048 -0.0484825 7.67389 0.147188 7.47904L2.78289 4.85436C3.09551 4.54302 3.36495 4.27468 3.60968 4.08866C3.87201 3.88927 4.16357 3.73838 4.52263 3.73825C4.88169 3.73812 5.17336 3.8888 5.43583 4.088C5.6807 4.27383 5.95034 4.54197 6.26318 4.85309L6.44602 5.0349C6.78849 5.37544 7.01052 5.59473 7.1954 5.73505C7.36872 5.8666 7.44977 5.88131 7.50346 5.88132C7.55715 5.88133 7.6382 5.86663 7.81155 5.73512C7.99646 5.59484 8.21854 5.37561 8.56109 5.03515L12.621 1H10.1119C9.83576 1 9.6119 0.776142 9.6119 0.5Z" fill="#29CCB0"/>
                        </svg>
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="stats-card s_box position-relative">
                    <div class="d-flex align-items-center">
                        <div class="icon-box three">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.00903 10.5C11.215 10.5 13.009 8.706 13.009 6.5C13.009 4.294 11.215 2.5 9.00903 2.5C6.80303 2.5 5.00903 4.294 5.00903 6.5C5.00903 8.706 6.80303 10.5 9.00903 10.5ZM9.00903 3.5C10.663 3.5 12.009 4.846 12.009 6.5C12.009 8.154 10.663 9.5 9.00903 9.5C7.35503 9.5 6.00903 8.154 6.00903 6.5C6.00903 4.846 7.35403 3.5 9.00903 3.5ZM11 12.5H7C2.94 12.5 1.5 15.473 1.5 18.019C1.5 20.296 2.71105 21.5 5.00305 21.5H12.9969C15.2889 21.5 16.5 20.296 16.5 18.019C16.5 15.473 15.06 12.5 11 12.5ZM12.9969 20.5H5.00305C3.27205 20.5 2.5 19.735 2.5 18.019C2.5 16.959 2.824 13.5 7 13.5H11C15.283 13.5 15.5 17.264 15.5 18.019C15.5 19.735 14.7289 20.5 12.9969 20.5ZM14.33 10.038C14.133 9.84496 14.129 9.52805 14.322 9.33105C14.514 9.13405 14.8331 9.13 15.0291 9.323C15.4351 9.721 15.979 9.93994 16.559 9.93994C17.784 9.93994 18.78 8.94397 18.78 7.71997C18.78 6.49597 17.784 5.5 16.559 5.5C16.211 5.5 15.895 5.57197 15.618 5.71497C15.374 5.84097 15.0709 5.74502 14.9449 5.49902C14.8179 5.25302 14.915 4.95205 15.161 4.82605C15.581 4.61005 16.052 4.50098 16.559 4.50098C18.335 4.50098 19.78 5.94595 19.78 7.72095C19.78 9.49595 18.336 10.941 16.559 10.941C15.716 10.94 14.924 10.62 14.33 10.038ZM22.5 16.6801C22.5 18.4981 21.491 19.5 19.66 19.5H18.98C18.704 19.5 18.48 19.276 18.48 19C18.48 18.724 18.704 18.5 18.98 18.5H19.66C20.932 18.5 21.5 17.9391 21.5 16.6801C21.5 15.8821 21.256 13.28 18.11 13.28H16.599C16.323 13.28 16.099 13.056 16.099 12.78C16.099 12.504 16.323 12.28 16.599 12.28H18.11C21.351 12.28 22.5 14.6501 22.5 16.6801Z" fill="white"/>
                            </svg>

                        </div>
                        <div class="stats-info">
                            <p class="stats-title">{{get_phrase('Total Customer')}}</p>
                            <p class="stats-value">{{$totalCustomer}}</p>
                        </div>
                    </div>
                    <p class="stats-change">
                        <svg width="15" height="9" viewBox="0 0 15 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.6119 0.5C9.6119 0.223858 9.83576 0 10.1119 0H13.8333C14.1095 0 14.3333 0.223858 14.3333 0.5V4.19722C14.3333 4.47337 14.1095 4.69722 13.8333 4.69722C13.5572 4.69722 13.3333 4.47337 13.3333 4.19722V1.70191L9.24277 5.76753C8.93014 6.0783 8.66066 6.34616 8.41594 6.53181C8.15361 6.73082 7.86215 6.88136 7.50334 6.88132C7.14454 6.88128 6.85311 6.73067 6.59083 6.5316C6.34615 6.34589 6.07675 6.07798 5.76419 5.76715L5.58135 5.58534C5.23858 5.2445 5.01635 5.02501 4.8313 4.88458C4.65781 4.75292 4.57671 4.73823 4.52299 4.73825C4.46928 4.73827 4.38819 4.75301 4.2148 4.8848C4.02985 5.02537 3.80778 5.24502 3.46526 5.58611L0.852811 8.18763C0.65714 8.38248 0.340559 8.38182 0.145706 8.18615C-0.0491461 7.99048 -0.0484825 7.67389 0.147188 7.47904L2.78289 4.85436C3.09551 4.54302 3.36495 4.27468 3.60968 4.08866C3.87201 3.88927 4.16357 3.73838 4.52263 3.73825C4.88169 3.73812 5.17336 3.8888 5.43583 4.088C5.6807 4.27383 5.95034 4.54197 6.26318 4.85309L6.44602 5.0349C6.78849 5.37544 7.01052 5.59473 7.1954 5.73505C7.36872 5.8666 7.44977 5.88131 7.50346 5.88132C7.55715 5.88133 7.6382 5.86663 7.81155 5.73512C7.99646 5.59484 8.21854 5.37561 8.56109 5.03515L12.621 1H10.1119C9.83576 1 9.6119 0.776142 9.6119 0.5Z" fill="#29CCB0"/>
                        </svg>
                    </p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="stats-card s_box position-relative">
                    <div class="d-flex align-items-center">
                        <div class="icon-box four">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M21.75 14.269C21.749 12.279 19.217 10.746 15.75 10.552V5.98999C15.749 3.40699 12.36 2.25 9 2.25C5.64 2.25 2.251 3.40599 2.25 5.98999V17.01C2.25 19.593 5.64 20.75 9 20.75C9.347 20.75 9.70301 20.718 10.057 20.683C11.351 21.406 13.178 21.75 15 21.75C18.359 21.75 21.75 20.593 21.75 18.01V14.269C21.75 14.27 21.75 14.27 21.75 14.269ZM20.25 14.271C20.25 15.329 18.005 16.512 15 16.512C11.995 16.512 9.75 15.329 9.75 14.271C9.75 13.883 10.057 13.479 10.588 13.122C10.606 13.112 10.62 13.098 10.637 13.087C11.561 12.487 13.133 12.03 15 12.03C18.005 12.03 20.25 13.213 20.25 14.271ZM14.25 9.53003C14.25 9.98103 13.854 10.358 13.477 10.621C12.086 10.786 10.885 11.175 9.98401 11.723C9.66401 11.75 9.34198 11.77 9.00098 11.77C6.17298 11.77 3.75098 10.538 3.75098 9.53003V8.47803C5.05198 9.33003 7.02898 9.73199 9.00098 9.73199C10.973 9.73199 12.95 9.33003 14.251 8.47803V9.53003H14.25ZM3.75 11.849C4.953 12.663 6.72401 13.172 8.48901 13.256C8.33701 13.577 8.25 13.915 8.25 14.27C8.25 14.27 8.25 14.27 8.25 14.271V15.479C5.758 15.288 3.75 14.189 3.75 13.271V11.849ZM9 3.75C11.581 3.75 14.25 4.58803 14.25 5.99103C14.25 7.44703 11.545 8.23199 9 8.23199C6.455 8.23199 3.75 7.44703 3.75 5.99103C3.75 4.58803 6.419 3.75 9 3.75ZM3.75 17.01V15.589C4.899 16.366 6.564 16.865 8.25 16.981V18.01C8.25 18.465 8.36 18.873 8.552 19.241C6.119 19.15 3.75 18.331 3.75 17.01ZM15 20.25C13.381 20.25 11.728 19.92 10.721 19.328C10.122 18.976 9.75098 18.532 9.75098 18.01V16.676C10.969 17.502 12.835 18.012 15.001 18.012C17.167 18.012 19.033 17.502 20.251 16.676V18.01C20.25 19.412 17.581 20.25 15 20.25Z" fill="white"/>
                            </svg>
                        </div>
                        <div class="stats-info">
                            <p class="stats-title">{{get_phrase('Total Order')}}</p>
                            <p class="stats-value">{{$totalOrder}}</p>
                        </div>
                    </div>
                    <p class="stats-change">
                        <svg width="15" height="9" viewBox="0 0 15 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M9.6119 0.5C9.6119 0.223858 9.83576 0 10.1119 0H13.8333C14.1095 0 14.3333 0.223858 14.3333 0.5V4.19722C14.3333 4.47337 14.1095 4.69722 13.8333 4.69722C13.5572 4.69722 13.3333 4.47337 13.3333 4.19722V1.70191L9.24277 5.76753C8.93014 6.0783 8.66066 6.34616 8.41594 6.53181C8.15361 6.73082 7.86215 6.88136 7.50334 6.88132C7.14454 6.88128 6.85311 6.73067 6.59083 6.5316C6.34615 6.34589 6.07675 6.07798 5.76419 5.76715L5.58135 5.58534C5.23858 5.2445 5.01635 5.02501 4.8313 4.88458C4.65781 4.75292 4.57671 4.73823 4.52299 4.73825C4.46928 4.73827 4.38819 4.75301 4.2148 4.8848C4.02985 5.02537 3.80778 5.24502 3.46526 5.58611L0.852811 8.18763C0.65714 8.38248 0.340559 8.38182 0.145706 8.18615C-0.0491461 7.99048 -0.0484825 7.67389 0.147188 7.47904L2.78289 4.85436C3.09551 4.54302 3.36495 4.27468 3.60968 4.08866C3.87201 3.88927 4.16357 3.73838 4.52263 3.73825C4.88169 3.73812 5.17336 3.8888 5.43583 4.088C5.6807 4.27383 5.95034 4.54197 6.26318 4.85309L6.44602 5.0349C6.78849 5.37544 7.01052 5.59473 7.1954 5.73505C7.36872 5.8666 7.44977 5.88131 7.50346 5.88132C7.55715 5.88133 7.6382 5.86663 7.81155 5.73512C7.99646 5.59484 8.21854 5.37561 8.56109 5.03515L12.621 1H10.1119C9.83576 1 9.6119 0.776142 9.6119 0.5Z" fill="#29CCB0"/>
                        </svg>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="dashboard-section d-flex flex-wrap gap-3 mt-4">
    <!-- Statistics Chart -->
    <div class="chart-card s_box flex-grow-1 p-3 rounded-3 shadow-sm bg-white h-450px">
        <h6 class="textTitle mb-4">{{get_phrase('Statistics')}}</h6>
        <canvas id="incomeExpenseChart" class="pb-5"></canvas>
    </div>
    <!-- Balance Card -->
    <div class="balance-card s_box text-white p-4 rounded-3 shadow-sm">
        <div class="d-flex flex-column justify-content-between h-100">
            <div class="blanceText">
                <h5>{{get_phrase('Balance')}}</h5>
                <p>{{get_phrase('Your Active Balance')}}</p>
                <h2>{{ currency($balance) }}</h2>
            </div>
            <canvas id="balanceLineChart" height="80" ></canvas>
        </div>
    </div>

</div>

<div class=" mt-4 mb-3">
  <div class="">
    <div class="row g-3">
      <!-- Left Section: Top Products -->
      <div class="col-lg-8 col-md-12">
            <div class="ol-card s_box p-3">
                  <div class="ol-card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="textTitle">{{get_phrase('Top Products')}}</h5>
                    </div>
                    <div class="table-responsive overflow-auto">
                            <table class="table table-borderless align-middle">
                            <thead class="text-muted">
                                <tr>
                                <th scope="col">{{get_phrase('ID')}}</th>
                                <th scope="col">{{get_phrase('Product')}}</th>
                            <th scope="col">{{get_phrase('Price')}}</th>
                                <th scope="col">{{get_phrase('Quantity')}}</th>
                                <th scope="col">{{get_phrase('Total Sales')}}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($topProducts as $key=> $product)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>
                                            {{ $product->title }}<br>
                                            <small class="text-muted">
                                                {{ get_phrase('SKU:') }} {{ $product->code }}
                                            </small>
                                        </td>
                                        <td>
                                            {{-- {{ currency(number_format($product->price, 2)) }} --}}
                                            @if ($product->discount_type)
                                            @if ($product->discount_type == 'flat')
                                                <div class="d-flex gap-2">
                                                    <h4 class="product-card-price text-16">{{ currency($product->price - $product->discount_value) }}</h4>
                                                    <del class="d-flex align-items-end">{{ currency($product->price) }}</del>
                                                </div>
                                            @else
                                                @php
                                                    $discount_amount = $product->price * ($product->discount_value / 100);
                                                @endphp
                                                <div class="d-flex gap-2">
                                                    <h4 class="product-card-price text-16">{{ currency($product->price - $discount_amount) }}</h4>
                                                    <del class="d-flex align-items-end">{{ currency($product->price) }}</del>
                                                </div>
                                            @endif
                                        @else
                                            <h4 class="product-card-price text-16">{{ currency($product->price) }}</h4>
                                        @endif

                                        </td>
                                        <td>{{ $product->total_quantity }}</td>
                                        <td>{{ currency(number_format($product->total_sales, 2)) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="admin-tInfo-pagi d-flex justify-content-between justify-content-center align-items-center flex-wrap gr-15">
                            {{ $topProducts->links() }}
                        </div>
                    </div>
                 </div>  
            </div>
      </div>

      <!-- Right Section: Stores -->
      <div class="col-lg-4 col-md-12">
            <div class="ol-card s_box p-3 ">
                <div class="ol-card-body">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="textTitle">{{get_phrase('Stores')}}</h5>
                        </div>
                        <div class="map-placeholder mb-3">
                            <div id="worldMap"></div>
                        </div>
                             <ul class="list-group list-group-flush small">
                                  @foreach ($stores as $store)
                                    @php
                                        $totalSales = \App\Models\Product::where('store_id', $store->id)->sum('price');
                                    @endphp
                                    <li class="list-group-item d-flex justify-content-between">
                                        <span>{{ $store->name }}</span>
                                        <span>{{ currency(number_format($totalSales, 2)) }}</span>
                                    </li>
                                @endforeach
                          </ul>
                  </div>
              </div>

      </div>
    </div>
  </div>
</div>

@endsection

@push('js')
<script type="text/javascript" src="{{ asset('assets/backend/js/chart.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/backend/js/index.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/backend/js/map.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/backend/js/worldLow.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/backend/js/Animated.js') }}"></script>

<script>
    'use strict';
    const months = @json($months);
    const monthlyTotals = @json($monthlyTotals);

    // Bar Chart (Monthly Income)
    const ctx = document.getElementById('incomeExpenseChart');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: months,
            datasets: [{
                label: 'Total Payments',
                data: monthlyTotals,
                backgroundColor: '#3B82F6',
                borderRadius: 6,
                barPercentage: 0.6, 
                categoryPercentage: 0.5,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: { position: 'top', labels: { usePointStyle: true } }
            },
            scales: {
                x: { grid: { display: false } },
                y: { beginAtZero: true, grid: { color: '#eee' } }
            }
        }
    });

    // Balance Line Chart (optional dummy)
        document.addEventListener('DOMContentLoaded', () => {
            const ctx2 = document.getElementById('balanceLineChart');
            if (ctx2) {
                new Chart(ctx2, {
                    type: 'line',
                    data: {
                        labels: months,
                        datasets: [{
                            data: monthlyTotals,
                            borderColor: '#ffffff',
                            borderWidth: 2,
                            fill: false,
                            tension: 0.4,
                            pointRadius: 0,
                            pointHoverRadius: 4
                        }]
                    },
                    options: {
                        plugins: { legend: { display: false } },
                        scales: { x: { display: false }, y: { display: false } }
                    }
                });
            }
        });


 
    am5.ready(function() {
        var root = am5.Root.new("worldMap");
        root.setThemes([am5themes_Animated.new(root)]);

        var chart = root.container.children.push(
            am5map.MapChart.new(root, {
                panX: "none",
                panY: "none",
                projection: am5map.geoMercator()
            })
        );

        var polygonSeries = chart.series.push(
            am5map.MapPolygonSeries.new(root, {
                geoJSON: am5geodata_worldLow
            })
        );

        var stores = @json($stores);

        polygonSeries.mapPolygons.template.setAll({
            tooltipText: "{name}",
            interactive: true,
            stroke: am5.color(0xffffff),
            strokeWidth: 0.5
        });

        polygonSeries.mapPolygons.template.adapters.add("fill", function(fill, target) {
            var countryName = (target.dataItem.dataContext.name || "").trim().toLowerCase();

            var hasStore = stores.some(s => 
                s.country && s.country.trim().toLowerCase() === countryName
            );

            if (hasStore) {
                return am5.color(0x4a90e2);
            }
            return am5.color(0xdfe6f0); 
        });
        polygonSeries.mapPolygons.template.adapters.add("tooltipText", function(text, target) {
            var countryName = (target.dataItem.dataContext.name || "").trim().toLowerCase();

            var storeList = stores.filter(s => 
                s.country && s.country.trim().toLowerCase() === countryName
            );

            if (storeList.length > 0) {
                let storeNames = storeList.map(s => "• " + s.name).join("\n");
                return `[bold]{name}[/]\n${storeNames}`;
            }

            return "{name}";
        });
    });


</script>


@endpush

