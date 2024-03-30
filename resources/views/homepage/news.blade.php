@extends('layout/mainlayout')

@section('page-content')
    <div class="zubuz-breadcrumb">
        <div class="container">
            <h1 class="post__title">Our Blog</h1>
            <nav class="breadcrumbs">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li aria-current="page"> Our Blog</li>
                </ul>
            </nav>

        </div>
    </div>
    <!-- End breadcrumb -->

    <div class="section zubuz-section-padding2">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="single-post-item">
                        <div class="post-thumbnail">
                            <img src="assets/images/blog/blog5.png" alt="">
                        </div>
                        <div class="post-content">
                            <div class="post-meta">
                                <div class="post-category">
                                    <a href="">Business</a>
                                </div>
                                <div class="post-date">
                                    June 18, 2024
                                </div>
                            </div>
                            <a href="single-blog.html">
                                <h3 class="entry-title">
                                    Fintech for millennials: How apps are meeting the best financial needs of a new generation
                                </h3>
                            </a>
                            <p>We’ve been embracing information technology (IT) in various facets of our lives. From manufacturing to healthcare, IT is omnipresent and...</p>
                            <a class="post-read-more" href="single-blog.html">
                                <svg width="26" height="22" viewBox="0 0 26 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.5 2.25L24.25 11M24.25 11L15.5 19.75M24.25 11L1.75 11" stroke="black" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="single-post-item">
                        <div class="post-thumbnail">
                            <img src="assets/images/blog/blog4.png" alt="">
                        </div>
                        <div class="post-content">
                            <div class="post-meta">
                                <div class="post-category">
                                    <a href="">Technology</a>
                                </div>
                                <div class="post-date">
                                    June 18, 2024
                                </div>
                            </div>
                            <a href="single-blog.html">
                                <h3 class="entry-title">
                                    I'm assuming the enterprise platform will only be available as a SaaS and not something that can be
                                </h3>
                            </a>
                            <p>I'm assuming the enterprise platform will only be available as a SaaS and not something that can be deployed into a personal cloud account...</p>
                            <a class="post-read-more" href="single-blog.html">
                                <svg width="26" height="22" viewBox="0 0 26 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.5 2.25L24.25 11M24.25 11L15.5 19.75M24.25 11L1.75 11" stroke="black" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="single-post-item">
                        <div class="post-thumbnail">
                            <img src="assets/images/blog/blog6.png" alt="">
                        </div>
                        <div class="post-content">
                            <div class="post-meta">
                                <div class="post-category">
                                    <a href="">Finance</a>
                                </div>
                                <div class="post-date">
                                    June 18, 2024
                                </div>
                            </div>
                            <a href="single-blog.html">
                                <h3 class="entry-title">
                                    Customer engagement for SaaS: 10 AI tools you must need for your SaaS business!
                                </h3>
                            </a>
                            <p>We all know how AI has been playing a significant role in the business or your day-to-day tasks, I’ve been using Open AI GPT 4 almost every time...</p>
                            <a class="post-read-more" href="single-blog.html">
                                <svg width="26" height="22" viewBox="0 0 26 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M15.5 2.25L24.25 11M24.25 11L15.5 19.75M24.25 11L1.75 11" stroke="black" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                                </svg>
                            </a>
                        </div>
                    </div>
                    <div class="zubuz-navigation">
                        <nav class="navigation pagination" aria-label="Posts">
                            <div class="nav-links">
                                <span aria-current="page" class="page-numbers current">1</span>
                                <a class="page-numbers" href="">2</a>
                                <a class="next page-numbers" href="">
                                    next
                                </a>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="right-sidebar">
                        <div class="widget">
                            <div class="wp-block-search__inside-wrapper">
                                <input type="search" placeholder="Search..." class="wp-block-search__input">
                                <button id="wp-block-search__button" type="submit">
                                    <img src="assets/images/icon/search.svg" alt="">
                                </button>
                            </div>
                        </div>
                        <div class="widget">
                            <h3 class="wp-block-heading">Categories:</h3>
                            <ul>
                                <li><a href="">SaaS</a></li>
                                <li><a href="">Marketing</a></li>
                                <li><a href="">Technology</a></li>
                                <li><a href="">SaaS Metrics</a></li>
                                <li><a href="">Development</a></li>
                            </ul>
                        </div>
                        <div class="widget zubuz_recent_posts_Widget">
                            <h3 class="wp-block-heading">Recent Posts:</h3>
                            <div class="post-item">
                                <div class="post-thumb">
                                    <a href="">
                                        <img src="assets/images/blog/blog1.png" alt="">
                                    </a>
                                </div>
                                <div class="post-text">
                                    <div class="post-date">
                                        June 18, 2024
                                    </div>
                                    <a class="post-title" href="">7 businesses for easy money</a>
                                </div>
                            </div>
                            <div class="post-item">
                                <div class="post-thumb">
                                    <a href="">
                                        <img src="assets/images/blog/blog2.png" alt="">
                                    </a>
                                </div>
                                <div class="post-text">
                                    <div class="post-date">
                                        June 18, 2024
                                    </div>
                                    <a class="post-title" href="">My 3 tips for business ideas</a>
                                </div>
                            </div>
                            <div class="post-item">
                                <div class="post-thumb">
                                    <a href="">
                                        <img src="assets/images/blog/blog3.png" alt="">
                                    </a>
                                </div>
                                <div class="post-text">
                                    <div class="post-date">
                                        June 18, 2024
                                    </div>
                                    <a class="post-title" href="">12 Halloween costume ideas</a>
                                </div>
                            </div>
                        </div>
                        <div class="widget">
                            <h3 class="wp-block-heading">Tags:</h3>
                            <div class="wp-block-tag-cloud">
                                <a href="">Marketing</a>
                                <a href="">Business</a>
                                <a href="">SaaS</a>
                                <a href="">Development</a>
                                <a href="">UI/UX</a>
                                <a href="">Brand</a>
                            </div>
                        </div>
                        <div class="zubuz-blog-contact">
                            <h3>How can we help you?</h3>
                            <p>We are here to help you! Tell us how we can help and we’ll get in touch within next 24hrs</p>
                            <a href="">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End section -->
@endsection