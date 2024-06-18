<?php $page = 'chat'; ?>
@extends('layout.mainlayout')
@section('content')
    <div class="page-wrapper chat-page-wrapper">
        <div class="content">
            <!-- Chat -->
            <div class="chat chat-messages" id="middle">
                <div class="slimscroll">
                    <div class="chat-header">
                        <div class="user-details">
                            <div class="d-lg-none">
                                <ul class="list-inline mt-2 me-2">
                                    <li class="list-inline-item">
                                        <a class="text-muted px-0 left_sides" href="#" data-chat="open">
                                            <i class="fas fa-arrow-left"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <figure class="avatar ms-1">
                                <img src="{{ URL::asset('/build/img/avatar/avatar-2.jpg') }}" class="rounded-circle"
                                    alt="image">
                            </figure>
                            <div class="mt-1">
                                <h5>Mark Villiams</h5>
                                <small class="last-seen">
                                    Last Seen at 07:15 PM
                                </small>
                            </div>
                        </div>
                        <div class="chat-options ">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="javascript:void(0)" class="btn btn-outline-light chat-search-btn"
                                        data-bs-toggle="tooltip" data-bs-placement="bottom" title="Search">
                                        <i class="bx bx-search"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="{{ url('video-call') }}" class="btn btn-outline-light"
                                        data-bs-toggle="tooltip" data-bs-placement="bottom" title="Video Call">
                                        <i class="bx bx-video"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="{{ url('audio-call') }}" class="btn btn-outline-light"
                                        data-bs-toggle="tooltip" data-bs-placement="bottom" title="Voice Call">
                                        <i class="bx bx-phone"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item dream_profile_menu">
                                    <a href="javascript:void(0)" class="btn btn-outline-light not-chat-user">
                                        <i class="bx bx-info-circle"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a class="btn btn-outline-light no-bg" href="#" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="#" class="dropdown-item "><span><i
                                                    class="bx bx-x"></i></span>Close Chat </a>
                                        <a href="#" class="dropdown-item"><span><i
                                                    class="bx bx-volume-mute"></i></span>Mute Notification</a>
                                        <a href="#" class="dropdown-item"><span><i
                                                    class="bx bx-time-five"></i></span>Disappearing Message</a>
                                        <a href="#" class="dropdown-item"><span><i
                                                    class="bx bx-brush-alt"></i></span>Clear
                                            Message</a>
                                        <a href="#" class="dropdown-item"><span><i
                                                    class="bx bx-trash-alt"></i></span>Delete Chat</a>
                                        <a href="#" class="dropdown-item"><span><i
                                                    class="bx bx-dislike"></i></span>Report</a>
                                        <a href="#" class="dropdown-item"><span><i
                                                    class="bx bx-block"></i></span>Block</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <!-- Chat Search -->
                        <div class="chat-search">
                            <form>
                                <span class="form-control-feedback"><i class="bx bx-search"></i></span>
                                <input type="text" name="chat-search" placeholder="Search Chats"
                                    class="form-control">
                                <div class="close-btn-chat"><span class="material-icons">close</span></div>
                            </form>
                        </div>
                        <!-- /Chat Search -->
                    </div>
                    <div class="chat-body">
                        <div class="messages">
                            <div class="chats">
                                <div class="chat-avatar">
                                    <img src="{{ URL::asset('/build/img/avatar/avatar-2.jpg') }}"
                                        class="rounded-circle dreams_chat" alt="image">
                                </div>
                                <div class="chat-content">
                                    <div class="chat-profile-name">
                                        <h6>Mark Villiams<span>8:16 PM</span></h6>
                                        <div class="chat-action-btns ms-3">
                                            <div class="chat-action-col">
                                                <a class="#" href="#" data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-horizontal-rounded"></i>
                                                </a>
                                                <div class="dropdown-menu chat-drop-menu dropdown-menu-end">
                                                    <a href="#" class="dropdown-item message-info-left"><span><i
                                                                class="bx bx-info-circle"></i></span>Message Info </a>
                                                    <a href="#" class="dropdown-item"><span><i
                                                                class="bx bx-share"></i></span>Reply</a>
                                                    <a href="#" class="dropdown-item"><span><i
                                                                class="bx bx-smile"></i></span>React</a>
                                                    <a href="#" class="dropdown-item"><span><i
                                                                class="bx bx-reply"></i></span>Forward</a>
                                                    <a href="#" class="dropdown-item"><span><i
                                                                class="bx bx-star"></i></span>Star Message</a>
                                                    <a href="#" class="dropdown-item"><span><i
                                                                class="bx bx-dislike"></i></span>Report</a>
                                                    <a href="#" class="dropdown-item"><span><i
                                                                class="bx bx-trash"></i></span>Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="message-content">
                                        Hello <a href="javascript:void(0);">@Alex</a> Thank you for the beautiful web
                                        design ahead schedule.
                                        <div class="emoj-group">
                                            <ul>
                                                <li class="emoj-action"><a href="javascript:void(0);"><i
                                                            class="bx bx-smile"></i></a>
                                                    <div class="emoj-group-list">
                                                        <ul>
                                                            <li><a href="javascript:void(0);"><img
                                                                        src="{{ URL::asset('/build/img/icons/emoj-icon-01.svg') }}"
                                                                        alt="Icon"></a></li>
                                                            <li><a href="javascript:void(0);"><img
                                                                        src="{{ URL::asset('/build/img/icons/emoj-icon-02.svg') }}"
                                                                        alt="Icon"></a></li>
                                                            <li><a href="javascript:void(0);"><img
                                                                        src="{{ URL::asset('/build/img/icons/emoj-icon-03.svg') }}"
                                                                        alt="Icon"></a></li>
                                                            <li><a href="javascript:void(0);"><img
                                                                        src="{{ URL::asset('/build/img/icons/emoj-icon-04.svg') }}"
                                                                        alt="Icon"></a></li>
                                                            <li><a href="javascript:void(0);"><img
                                                                        src="{{ URL::asset('/build/img/icons/emoj-icon-05.svg') }}"
                                                                        alt="Icon"></a></li>
                                                            <li class="add-emoj"><a href="javascript:void(0);"><i
                                                                        class="bx bx-plus"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </li>
                                                <li><a href="#"><i class="bx bx-share"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="chat-line">
                                <span class="chat-date">Today, July 24</span>
                            </div>
                            <div class="chats chats-right">
                                <div class="chat-content">
                                    <div class="chat-profile-name text-end">
                                        <h6>Alex Smith<span>8:16 PM</span></h6>
                                        <div class="chat-action-btns ms-3">
                                            <div class="chat-action-col">
                                                <a class="#" href="#" data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-horizontal-rounded"></i>
                                                </a>
                                                <div class="dropdown-menu chat-drop-menu dropdown-menu-end">
                                                    <a href="#" class="dropdown-item message-info-left"><span><i
                                                                class="bx bx-info-circle"></i></span>Message Info </a>
                                                    <a href="#" class="dropdown-item"><span><i
                                                                class="bx bx-share"></i></span>Reply</a>
                                                    <a href="#" class="dropdown-item"><span><i
                                                                class="bx bx-smile"></i></span>React</a>
                                                    <a href="#" class="dropdown-item"><span><i
                                                                class="bx bx-reply"></i></span>Forward</a>
                                                    <a href="#" class="dropdown-item"><span><i
                                                                class="bx bx-star"></i></span>Star Message</a>
                                                    <a href="#" class="dropdown-item"><span><i
                                                                class="bx bx-dislike"></i></span>Report</a>
                                                    <a href="#" class="dropdown-item"><span><i
                                                                class="bx bx-trash"></i></span>Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="message-content ">
                                        <div class="emoj-group rig-emoji-group">
                                            <ul>
                                                <li class="emoj-action"><a href="javascript:void(0);"><i
                                                            class="bx bx-smile"></i></a>
                                                    <div class="emoj-group-list">
                                                        <ul>
                                                            <li><a href="javascript:void(0);"><img
                                                                        src="{{ URL::asset('/build/img/icons/emoj-icon-01.svg') }}"
                                                                        alt="Icon"></a></li>
                                                            <li><a href="javascript:void(0);"><img
                                                                        src="{{ URL::asset('/build/img/icons/emoj-icon-02.svg') }}"
                                                                        alt="Icon"></a></li>
                                                            <li><a href="javascript:void(0);"><img
                                                                        src="{{ URL::asset('/build/img/icons/emoj-icon-03.svg') }}"
                                                                        alt="Icon"></a></li>
                                                            <li><a href="javascript:void(0);"><img
                                                                        src="{{ URL::asset('/build/img/icons/emoj-icon-04.svg') }}"
                                                                        alt="Icon"></a></li>
                                                            <li><a href="javascript:void(0);"><img
                                                                        src="{{ URL::asset('/build/img/icons/emoj-icon-05.svg') }}"
                                                                        alt="Icon"></a></li>
                                                            <li class="add-emoj"><a href="javascript:void(0);"><i
                                                                        class="bx bx-plus"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </li>
                                                <li><a href="#"><i class="bx bx-share"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="chat-voice-group">
                                            <ul>
                                                <li><a href="javascript:void(0);"><span><img
                                                                src="{{ URL::asset('/build/img/icons/play-01.svg') }}"
                                                                alt="image"></span></a></li>
                                                <li><img src="{{ URL::asset('/build/img/icons/voice.svg') }}"
                                                        alt="image"></li>
                                                <li>0:05</li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="chat-avatar">
                                    <img src="{{ URL::asset('/build/img/avatar/avatar-10.jpg') }}"
                                        class="rounded-circle dreams_chat" alt="image">
                                </div>
                            </div>
                            <div class="chats">
                                <div class="chat-avatar">
                                    <img src="{{ URL::asset('/build/img/avatar/avatar-2.jpg') }}"
                                        class="rounded-circle dreams_chat" alt="image">
                                </div>
                                <div class="chat-content">
                                    <div class="chat-profile-name">
                                        <h6>Mark Villiams<span>8:16 PM</span><span class="check-star"><i
                                                    class="bx bxs-star"></i></span></h6>
                                        <div class="chat-action-btns ms-2">
                                            <div class="chat-action-col">
                                                <a class="#" href="#" data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-horizontal-rounded"></i>
                                                </a>
                                                <div class="dropdown-menu chat-drop-menu dropdown-menu-end">
                                                    <a href="#" class="dropdown-item message-info-left"><span><i
                                                                class="bx bx-info-circle"></i></span>Message Info </a>
                                                    <a href="#" class="dropdown-item"><span><i
                                                                class="bx bx-share"></i></span>Reply</a>
                                                    <a href="#" class="dropdown-item"><span><i
                                                                class="bx bx-smile"></i></span>React</a>
                                                    <a href="#" class="dropdown-item"><span><i
                                                                class="bx bx-reply"></i></span>Forward</a>
                                                    <a href="#" class="dropdown-item"><span><i
                                                                class="bx bxs-star"></i></span>Unstar Message</a>
                                                    <a href="#" class="dropdown-item"><span><i
                                                                class="bx bx-dislike"></i></span>Report</a>
                                                    <a href="#" class="dropdown-item"><span><i
                                                                class="bx bx-trash"></i></span>Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="message-content award-link chat-award-link">
                                        <a href="javascript:void(0);"
                                            class="mb-1">https://www.youtube.com/watch?v=GCmL3mS0Psk</a>
                                        <img src="{{ URL::asset('/build/img/sending-img.png') }}" alt="img">
                                        <div class="emoj-group">
                                            <ul>
                                                <li class="emoj-action"><a href="javascript:void(0);"><i
                                                            class="bx bx-smile"></i></a>
                                                    <div class="emoj-group-list">
                                                        <ul>
                                                            <li><a href="javascript:void(0);"><img
                                                                        src="{{ URL::asset('/build/img/icons/emoj-icon-01.svg') }}"
                                                                        alt="Icon"></a></li>
                                                            <li><a href="javascript:void(0);"><img
                                                                        src="{{ URL::asset('/build/img/icons/emoj-icon-02.svg') }}"
                                                                        alt="Icon"></a></li>
                                                            <li><a href="javascript:void(0);"><img
                                                                        src="{{ URL::asset('/build/img/icons/emoj-icon-03.svg') }}"
                                                                        alt="Icon"></a></li>
                                                            <li><a href="javascript:void(0);"><img
                                                                        src="{{ URL::asset('/build/img/icons/emoj-icon-04.svg') }}"
                                                                        alt="Icon"></a></li>
                                                            <li><a href="javascript:void(0);"><img
                                                                        src="{{ URL::asset('/build/img/icons/emoj-icon-05.svg') }}"
                                                                        alt="Icon"></a></li>
                                                            <li class="add-emoj"><a href="javascript:void(0);"><i
                                                                        class="bx bx-plus"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </li>
                                                <li><a href="#"><i class="bx bx-share"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="chats chats-right">
                                <div class="chat-content">
                                    <div class="chat-profile-name justify-content-end">
                                        <h6>Alex Smith<span>8:16 PM</span></h6>
                                        <div class="chat-action-btns ms-3">
                                            <div class="chat-action-col">
                                                <a class="#" href="#" data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-horizontal-rounded"></i>
                                                </a>
                                                <div class="dropdown-menu chat-drop-menu dropdown-menu-end">
                                                    <a href="#" class="dropdown-item message-info-left"><span><i
                                                                class="bx bx-info-circle"></i></span>Message Info </a>
                                                    <a href="#" class="dropdown-item"><span><i
                                                                class="bx bx-share"></i></span>Reply</a>
                                                    <a href="#" class="dropdown-item"><span><i
                                                                class="bx bx-smile"></i></span>React</a>
                                                    <a href="#" class="dropdown-item"><span><i
                                                                class="bx bx-reply"></i></span>Forward</a>
                                                    <a href="#" class="dropdown-item"><span><i
                                                                class="bx bx-star"></i></span>Star Message</a>
                                                    <a href="#" class="dropdown-item"><span><i
                                                                class="bx bx-dislike"></i></span>Report</a>
                                                    <a href="#" class="dropdown-item"><span><i
                                                                class="bx bx-trash"></i></span>Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="message-content fancy-msg-box">
                                        <div class="emoj-group wrap-emoji-group ">
                                            <ul>
                                                <li class="emoj-action"><a href="javascript:void(0);"><i
                                                            class="bx bx-smile"></i></a>
                                                    <div class="emoj-group-list">
                                                        <ul>
                                                            <li><a href="javascript:void(0);"><img
                                                                        src="{{ URL::asset('/build/img/icons/emoj-icon-01.svg') }}"
                                                                        alt="Icon"></a></li>
                                                            <li><a href="javascript:void(0);"><img
                                                                        src="{{ URL::asset('/build/img/icons/emoj-icon-02.svg') }}"
                                                                        alt="Icon"></a></li>
                                                            <li><a href="javascript:void(0);"><img
                                                                        src="{{ URL::asset('/build/img/icons/emoj-icon-03.svg') }}"
                                                                        alt="Icon"></a></li>
                                                            <li><a href="javascript:void(0);"><img
                                                                        src="{{ URL::asset('/build/img/icons/emoj-icon-04.svg') }}"
                                                                        alt="Icon"></a></li>
                                                            <li><a href="javascript:void(0);"><img
                                                                        src="{{ URL::asset('/build/img/icons/emoj-icon-05.svg') }}"
                                                                        alt="Icon"></a></li>
                                                            <li class="add-emoj"><a href="javascript:void(0);"><i
                                                                        class="bx bx-plus"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </li>
                                                <li><a href="javascript:void(0);"><i class="bx bx-share"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                        <div class="download-col">
                                            <ul class="nav mb-0">
                                                <li>
                                                    <div class="image-download-col">
                                                        <a href="{{ URL::asset('/build/img/media/media-02.jpg') }}"
                                                            data-fancybox="gallery" class="fancybox">
                                                            <img src="{{ URL::asset('/build/img/media/media-02.jpg') }}"
                                                                alt="">
                                                        </a>

                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="image-download-col ">
                                                        <a href="{{ URL::asset('/build/img/media/media-03.jpg') }}"
                                                            data-fancybox="gallery" class="fancybox">
                                                            <img src="{{ URL::asset('/build/img/media/media-03.jpg') }}"
                                                                alt="">
                                                        </a>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="image-download-col image-not-download">
                                                        <a href="{{ URL::asset('/build/img/media/media-01.jpg') }}"
                                                            data-fancybox="gallery" class="fancybox">
                                                            <img src="{{ URL::asset('/build/img/media/media-01.jpg') }}"
                                                                alt="">
                                                            <span>10+</span>
                                                        </a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="chat-avatar">
                                    <img src="{{ URL::asset('/build/img/avatar/avatar-10.jpg') }}"
                                        class="rounded-circle dreams_chat" alt="image">
                                </div>
                            </div>

                            <div class="chats">
                                <div class="chat-avatar">
                                    <img src="{{ URL::asset('/build/img/avatar/avatar-2.jpg') }}"
                                        class="rounded-circle dreams_chat" alt="image">
                                </div>
                                <div class="chat-content">
                                    <div class="chat-profile-name">
                                        <h6>Mark Villiams<span>8:16 PM</span></h6>
                                        <div class="chat-action-btns ms-3">
                                            <div class="chat-action-col">
                                                <a class="#" href="#" data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-horizontal-rounded"></i>
                                                </a>
                                                <div class="dropdown-menu chat-drop-menu dropdown-menu-end">
                                                    <a href="#" class="dropdown-item message-info-left"><span><i
                                                                class="bx bx-info-circle"></i></span>Message Info </a>
                                                    <a href="#" class="dropdown-item"><span><i
                                                                class="bx bx-share"></i></span>Reply</a>
                                                    <a href="#" class="dropdown-item"><span><i
                                                                class="bx bx-smile"></i></span>React</a>
                                                    <a href="#" class="dropdown-item"><span><i
                                                                class="bx bx-reply"></i></span>Forward</a>
                                                    <a href="#" class="dropdown-item"><span><i
                                                                class="bx bx-star"></i></span>Star Message</a>
                                                    <a href="#" class="dropdown-item"><span><i
                                                                class="bx bx-dislike"></i></span>Report</a>
                                                    <a href="#" class="dropdown-item"><span><i
                                                                class="bx bx-trash"></i></span>Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="message-content review-files">
                                        <p class="d-flex align-items-center">Please check and review the files<span
                                                class="ms-1 d-flex"><img
                                                    src="{{ URL::asset('/build/img/icons/smile-chat.svg') }}"
                                                    alt="Icon"></span></p>
                                        <div class="file-download d-flex align-items-center mb-0">
                                            <div class="file-type d-flex align-items-center justify-content-center me-2">
                                                <i class="bx bxs-file-doc"></i>
                                            </div>
                                            <div class="file-details">
                                                <span class="file-name">Landing_page_V1.doc</span>
                                                <ul>
                                                    <li>80 Bytes</li>
                                                    <li><a href="javascript:void(0);">Download</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="emoj-group">
                                            <ul>
                                                <li class="emoj-action"><a href="javascript:void(0);"><i
                                                            class="bx bx-smile"></i></a>
                                                    <div class="emoj-group-list">
                                                        <ul>
                                                            <li><a href="javascript:void(0);"><img
                                                                        src="{{ URL::asset('/build/img/icons/emoj-icon-01.svg') }}"
                                                                        alt="Icon"></a></li>
                                                            <li><a href="javascript:void(0);"><img
                                                                        src="{{ URL::asset('/build/img/icons/emoj-icon-02.svg') }}"
                                                                        alt="Icon"></a></li>
                                                            <li><a href="javascript:void(0);"><img
                                                                        src="{{ URL::asset('/build/img/icons/emoj-icon-03.svg') }}"
                                                                        alt="Icon"></a></li>
                                                            <li><a href="javascript:void(0);"><img
                                                                        src="{{ URL::asset('/build/img/icons/emoj-icon-04.svg') }}"
                                                                        alt="Icon"></a></li>
                                                            <li><a href="javascript:void(0);"><img
                                                                        src="{{ URL::asset('/build/img/icons/emoj-icon-05.svg') }}"
                                                                        alt="Icon"></a></li>
                                                            <li class="add-emoj"><a href="javascript:void(0);"><i
                                                                        class="bx bx-plus"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </li>
                                                <li><a href="#"><i class="bx bx-share"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="like-chat-grp">
                                        <ul>
                                            <li class="like-chat"><a href="javascript:void(0);">2<img
                                                        src="{{ URL::asset('/build/img/icons/like.svg') }}"
                                                        alt="Icon"></a></li>
                                            <li class="comment-chat"><a href="javascript:void(0);">2<img
                                                        src="{{ URL::asset('/build/img/icons/heart.svg') }}"
                                                        alt="Icon"></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="chats">
                                <div class="chat-avatar">
                                    <img src="{{ URL::asset('/build/img/avatar/avatar-2.jpg') }}"
                                        class="rounded-circle dreams_chat" alt="image">
                                </div>
                                <div class="chat-content">
                                    <div class="chat-profile-name">
                                        <h6>Mark Villiams<span>8:16 PM</span></h6>
                                        <div class="chat-action-btns ms-3">
                                            <div class="chat-action-col">
                                                <a class="#" href="#" data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-horizontal-rounded"></i>
                                                </a>
                                                <div class="dropdown-menu chat-drop-menu dropdown-menu-end">
                                                    <a href="#" class="dropdown-item message-info-left"><span><i
                                                                class="bx bx-info-circle"></i></span>Message Info </a>
                                                    <a href="#" class="dropdown-item"><span><i
                                                                class="bx bx-share"></i></span>Reply</a>
                                                    <a href="#" class="dropdown-item"><span><i
                                                                class="bx bx-smile"></i></span>React</a>
                                                    <a href="#" class="dropdown-item"><span><i
                                                                class="bx bx-reply"></i></span>Forward</a>
                                                    <a href="#" class="dropdown-item"><span><i
                                                                class="bx bx-star"></i></span>Star Message</a>
                                                    <a href="#" class="dropdown-item"><span><i
                                                                class="bx bx-dislike"></i></span>Report</a>
                                                    <a href="#" class="dropdown-item"><span><i
                                                                class="bx bx-trash"></i></span>Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="message-content">
                                        Thank you for your support
                                        <div class="emoj-group">
                                            <ul>
                                                <li class="emoj-action"><a href="javascript:void(0);"><i
                                                            class="bx bx-smile"></i></a>
                                                    <div class="emoj-group-list">
                                                        <ul>
                                                            <li><a href="javascript:void(0);"><img
                                                                        src="{{ URL::asset('/build/img/icons/emoj-icon-01.svg') }}"
                                                                        alt="Icon"></a></li>
                                                            <li><a href="javascript:void(0);"><img
                                                                        src="{{ URL::asset('/build/img/icons/emoj-icon-02.svg') }}"
                                                                        alt="Icon"></a></li>
                                                            <li><a href="javascript:void(0);"><img
                                                                        src="{{ URL::asset('/build/img/icons/emoj-icon-03.svg') }}"
                                                                        alt="Icon"></a></li>
                                                            <li><a href="javascript:void(0);"><img
                                                                        src="{{ URL::asset('/build/img/icons/emoj-icon-04.svg') }}"
                                                                        alt="Icon"></a></li>
                                                            <li><a href="javascript:void(0);"><img
                                                                        src="{{ URL::asset('/build/img/icons/emoj-icon-05.svg') }}"
                                                                        alt="Icon"></a></li>
                                                            <li class="add-emoj"><a href="javascript:void(0);"><i
                                                                        class="bx bx-plus"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </li>
                                                <li><a href="javascript:void(0);"><i class="bx bx-share"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="chats">
                                <div class="chat-avatar">
                                    <img src="{{ URL::asset('/build/img/avatar/avatar-2.jpg') }}"
                                        class="rounded-circle dreams_chat" alt="image">
                                </div>
                                <div class="chat-content chat-cont-type">
                                    <div class="chat-profile-name chat-type-wrapper">
                                        <p>Mark Villiams Typing...</p>
                                    </div>
                                </div>
                            </div>




                            <div class="chats forward-chat-msg">
                                <div class="chat-avatar">
                                    <img src="{{ URL::asset('/build/img/avatar/avatar-2.jpg') }}"
                                        class="rounded-circle dreams_chat" alt="image">
                                </div>
                                <div class="chat-content">
                                    <div class="chat-profile-name">
                                        <h6>Mark Villiams<span>8:16 PM</span></h6>
                                        <div class="chat-action-btns ms-3">
                                            <div class="chat-action-col">
                                                <a class="#" href="#" data-bs-toggle="dropdown">
                                                    <i class="bx bx-dots-horizontal-rounded"></i>
                                                </a>
                                                <div class="dropdown-menu chat-drop-menu dropdown-menu-end">
                                                    <a href="#" class="dropdown-item message-info-left"><span><i
                                                                class="bx bx-info-circle"></i></span>Message Info </a>
                                                    <a href="#" class="dropdown-item"><span><i
                                                                class="bx bx-share"></i></span>Reply</a>
                                                    <a href="#" class="dropdown-item"><span><i
                                                                class="bx bx-smile"></i></span>React</a>
                                                    <a href="#" class="dropdown-item"><span><i
                                                                class="bx bx-reply"></i></span>Forward</a>
                                                    <a href="#" class="dropdown-item"><span><i
                                                                class="bx bx-star"></i></span>Star Message</a>
                                                    <a href="#" class="dropdown-item"><span><i
                                                                class="bx bx-dislike"></i></span>Report</a>
                                                    <a href="#" class="dropdown-item"><span><i
                                                                class="bx bx-trash"></i></span>Delete</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="message-content">
                                        Thank you for your support
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="chat-footer">
                    <form>
                        <div class="smile-foot">
                            <div class="chat-action-btns">
                                <div class="chat-action-col">
                                    <a class="action-circle" href="#" data-bs-toggle="dropdown">
                                        <i class="bx bx-dots-vertical-rounded"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        <a href="#" class="dropdown-item "><span><i
                                                    class="bx bx-file"></i></span>Document</a>
                                        <a href="#" class="dropdown-item"><span><i
                                                    class="bx bx-camera"></i></span>Camera</a>
                                        <a href="#" class="dropdown-item"><span><i
                                                    class="bx bx-image"></i></span>Gallery</a>
                                        <a href="#" class="dropdown-item"><span><i
                                                    class="bx bx-volume-full"></i></span>Audio</a>
                                        <a href="#" class="dropdown-item"><span><i
                                                    class="bx bx-map"></i></span>Location</a>
                                        <a href="#" class="dropdown-item"><span><i
                                                    class="bx bx-user-pin"></i></span>Contact</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="smile-foot emoj-action-foot">
                            <a href="#" class="action-circle"><i class="bx bx-smile"></i></a>
                            <div class="emoj-group-list-foot down-emoji-circle">
                                <ul>
                                    <li><a href="javascript:void(0);"><img
                                                src="{{ URL::asset('/build/img/icons/emoj-icon-01.svg') }}"
                                                alt="Icon"></a></li>
                                    <li><a href="javascript:void(0);"><img
                                                src="{{ URL::asset('/build/img/icons/emoj-icon-02.svg') }}"
                                                alt="Icon"></a></li>
                                    <li><a href="javascript:void(0);"><img
                                                src="{{ URL::asset('/build/img/icons/emoj-icon-03.svg') }}"
                                                alt="Icon"></a></li>
                                    <li><a href="javascript:void(0);"><img
                                                src="{{ URL::asset('/build/img/icons/emoj-icon-04.svg') }}"
                                                alt="Icon"></a></li>
                                    <li><a href="javascript:void(0);"><img
                                                src="{{ URL::asset('/build/img/icons/emoj-icon-05.svg') }}"
                                                alt="Icon"></a></li>
                                    <li class="add-emoj"><a href="javascript:void(0);"><i class="bx bx-plus"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="smile-foot">
                            <a href="#" class="action-circle"><i class="bx bx-microphone-off"></i></a>
                        </div>
                        <input type="text" class="form-control chat_form" placeholder="Type your message here...">
                        <div class="form-buttons">
                            <button class="btn send-btn" type="submit">
                                <i class="bx bx-paper-plane"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- /Chat -->

          
        </div>
    </div>
@endsection
