@extends('layouts.usernav')
@section('content')
  

  <section class="home" id="home">
    <div class="head_container">
      <div class="box">
        <div class="text">
          <h1>Hotel RK</h1>
          <p>"Hotel RK offers luxurious accommodations with modern amenities and personalized service, ensuring a memorable stay in a prime, convenient location." </p>
          <button></button>
        </div>
      </div>
      <div class="image">
        <img src="{{ asset('images/image/home1.jpg') }}" class="slide">
      </div>
      <div class="image_item">
        <img src="{{ asset('images/image/home1.jpg') }}" alt="" class="slide active" onclick="img('images/image/home1.jpg')">
        <img src="{{ asset('images/image/home2.jpg') }}" alt="" class="slide" onclick="img('images/image/home2.jpg')">
        <img src="{{ asset('images/image/home3.jpg') }}" alt="" class="slide" onclick="img('images/image/home3.jpg')">
        <img src="{{ asset('images/image/home4.jpg') }}" alt="" class="slide" onclick="img('images/image/home4.jpg')">
      </div>
    </div>
  </section>
  <script>
    function img(anything) {
      document.querySelector('.slide').src = anything;
    }

    function change(change) {
      const line = document.querySelector('.image');
      line.style.background = change;
    }
    
  </script>
  <section class="book">
    <div class="container flex">
      <div class="input grid">
        <div class="box">
          <label>Check-in:</label>
          <input type="date" placeholder="Check-in-Date">
        </div>
        <div class="box">
          <label>Check-out:</label>
          <input type="date" placeholder="Check-out-Date">
        </div>
        <div class="box">
          <label>Adults:</label> <br>
          <input type="number" placeholder="0">
        </div>
        <div class="box">
          <label>Children:</label> <br>
          <input type="number" placeholder="0">
        </div>
      </div>
      <div class="search">
        <input type="submit" value="SEARCH">
      </div>
    </div>
  </section>
  <section class="about top" id="about">
    <div class="container flex">
      <div class="left">
        <div class="img">
          <img src="{{asset('images/image/a1.jpg')}}" alt="" class="image1">
          <img src="{{asset('images/image/a2.jpg')}}" alt="" class="image2">
        </div>
      </div>
      <div class="right">
        <div class="heading">
          <h5>RAISING COMFOMRT TO THE HIGHEST LEVEL</h5>
          <h2>Welcome to RK Hotel Resort</h2>
          <p>
          Experience unparalleled comfort and luxury at RK Hotel Resort, where every detail is designed to elevate your stay. From our serene, well-appointed rooms to exceptional service, we promise a warm welcome and an unforgettable retreat. </p>
          <p>Discover the perfect blend of relaxation and sophistication with us—your ultimate escape awaits at RK Hotel Resort."</p>
          <button class="btn1">READ MORE</button>
        </div>
      </div>
    </div>
  </section>
  <section class="wrapper top">
    <div class="container">
      <div class="text">
        <h2>Our Amenities</h2>
        <p>At RK Hotel Resort, we offer a wide range of amenities to ensure a comfortable and memorable stay: </p>

        <div class="content">
          <div class="box flex">
            <i class="fas fa-swimming-pool"></i>
            <span>Swimming pool</span>
          </div>
          <div class="box flex">
            <i class="fas fa-dumbbell"></i>
            <span>Gym & yogo</span>
          </div>
          <div class="box flex">
            <i class="fas fa-spa"></i>
            <span>Spa & massage</span>
          </div>
          <div class="box flex">
            <i class="fas fa-ship"></i>
            <span>Boat Tours</span>
          </div>
          <div class="box flex">
            <i class="fas fa-swimmer"></i>
            <span>Surfing Lessons</span>
          </div>
          <div class="box flex">
            <i class="fas fa-microphone"></i>
            <span>Conference room</span>
          </div>
          <div class="box flex">
            <i class="fas fa-water"></i>
            <span>Diving & smorking</span>
          </div>
          <div class="box flex">
            <i class="fas fa-umbrella-beach"></i>
            <span>Private Beach</span>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="room top" id="room">
    <div class="container">
      <div class="heading_top flex1">
        <div class="heading">
          <h5>RAISING COMFORT TO THE HIGHEST LEVEL</h5>
          <h2>Rooms $ Suites</h2>
        </div>
        <div class="button">
          <button class="btn1">VIEW ALL</button>
        </div>
      </div>

      <div class="content grid">

      @foreach($rooms as $room)
        <div class="box">
          <div class="img">
            <img src="{{asset('images/rooms/'.$room->photo)}}" alt="">
          </div>
          <div class="text">
            <h3>{{$room->name}}</h3>
            <p> <span>RS</span>{{$room->price}} <span>/per night</span> </p>
          </div>
        </div>
        @endforeach

      </div>
    </div>
  </section>
  <section class="wrapper wrapper2 top">
    <div class="container">
      <div class="text">
        <div class="heading">
          <h5>AT THE HEART OF COMMUNICATION</h5>
          <h2>People Say</h2>
        </div>

        <div class="para">
          <p>Wonderful Stay!
RK Hotel Resort exceeded my expectations. The staff was welcoming, the room was spotless and beautifully designed, and the food was delicious. I loved the relaxing spa and the gorgeous pool area. Every detail made me feel pampered—can't wait to return!</p>
          <div class="box flex">
            <div class="img">
              <img src="{{asset('images/image/c.jpg')}}" alt="">
            </div>
            <div class="name">
              <h5>Sohan Kafle</h5>
              <h5>Gaindakot</h5>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <section class="restaurant top" id="restaurant">
    <div class="container flex">
      <div class="left">
        <img src="{{asset('images/image/re.jpg')}}" alt="">
      </div>
      <div class="right">
        <div class="text">
          <h2>Our Restaurant</h2>
          <p> We offer:</p>
        </div>
        <div class="accordionWrapper">
          <div class="accordionItem open">
            <h2 class="accordionIHeading">Italian Kitchen</h2>
            <div class="accordionItemContent">
              <p>Indulge in the flavors of Italy at our Italian Kitchen, where authentic recipes meet the finest ingredients. Enjoy hand-made pasta, wood-fired pizzas, and classic Italian dishes crafted with passion by our expert chefs. Whether it’s a cozy dinner for two or a group celebration, our warm and inviting ambiance makes every meal a memorable experience. Buon appetito!</p>
            </div>
          </div>
          <div class="accordionItem open">
            <h2 class="accordionIHeading">Italian Kitchen</h2>
            <div class="accordionItemContent">
              <p>Spice up your stay with the bold, vibrant flavors of our Mexican Kitchen. Savor authentic Mexican dishes like sizzling fajitas, flavorful tacos, and rich, homemade salsas—all crafted with fresh ingredients and traditional recipes. Our chefs bring a true taste of Mexico to your table, perfect for a lively dinner or a festive celebration. Come experience the warmth, color, and zest of Mexican cuisine!</p>
            </div>
         </div>
          
          </div>
        </div>
      </div>
    </div>
  </section>
  <script>
    var accItem = document.getElementsByClassName('accordionItem');
    var accHD = document.getElementsByClassName('accordionIHeading');

    for (i = 0; i < accHD.length; i++) {
      accHD[i].addEventListener('click', toggleItem, false);
    }

    function toggleItem() {
      var itemClass = this.parentNode.className;
      for (var i = 0; i < accItem.length; i++) {
        accItem[i].className = 'accordionItem close';
      }
      if (itemClass == 'accordionItem close') {
        this.parentNode.className = 'accordionItem open';
      }
    }
  </script>



  <section class="gallary mtop " id="gallary">
    <div class="container">
      <div class="heading_top flex1">
        <div class="heading">
          <h5>WELCOME TO OUR PHOTO GALLERY</h5>
          <h2>Photo Gallery of Our Hotel</h2>
        </div>
        <div class="button">
          <button class="btn1">VIEW GALLERY</button>
        </div>
      </div>

      <div class="owl-carousel owl-theme">
        <div class="item">
          <img src="{{asset('images/image/g1.jpg')}}" alt="">
        </div>
        <div class="item">
          <img src="{{asset('images/image/g2.jpg')}}" alt="">
        </div>
        <div class="item">
          <img src="{{asset('images/image/g3.jpg')}}" alt="">
        </div>
        <div class="item">
          <img src="{{asset('images/image/g4.jpg')}}" alt="">
        </div>
        <div class="item">
          <img src="{{asset('images/image/g5.jpg')}}" alt="">
        </div>
        <div class="item">
          <img src="{{asset('images/image/g6.jpg')}}" alt="">
        </div>
        <div class="item">
          <img src="{{asset('images/image/g7.jpg')}}" alt="">
        </div>
        <div class="item">
          <img src="{{asset('images/image/g8.jpg')}}" alt="">
        </div>
      </div>

    </div>
  </section>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.js" integrity="sha512-gY25nC63ddE0LcLPhxUJGFxa2GoIyA5FLym4UJqHDEMHjp8RET6Zn/SHo1sltt3WuVtqfyxECP38/daUc/WVEA==" crossorigin="anonymous"
    referrerpolicy="no-referrer"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous"
    referrerpolicy="no-referrer"></script>
  <script>
    $('.owl-carousel').owlCarousel({
      loop: true,
      margin: 10,
      nav: true,
      dots: false,
      navText: ["<i class='fas fa-chevron-left'></i>", "<i class='fas fa-chevron-right'></i>"],
      responsive: {
        0: {
          items: 1
        },
        768: {
          items: 2
        },
        1000: {
          items: 4
        }
      }
    })
  </script>



  <section class="map top">
    <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d14131.036667732067!2d85.32395955!3d27.69383745!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2snp!4v1637755481449!5m2!1sen!2snp" width="600" height="450" style="border:0;"
      allowfullscreen="" loading="lazy"></iframe>
  </section>


  <footer>
    <div class="container grid top">
      <div class="box">
        <img src="https://img.icons8.com/external-flatart-icons-flat-flatarticons/48/000000/external-hotel-hotel-services-and-city-elements-flatart-icons-flat-flatarticons-1.png" />
        <p> Perfect place for your hangout and holiday </p>

        <p>Accepted payment methods</p>
        <div class="payment grid">
          <img src="https://i.pinimg.com/originals/24/9e/a4/249ea43db1a3ef78209f960ca9145fde.png" />
          
        </div>
      </div>

      <div class="box">
        <h3>Recent News</h3>

        <ul>
          <li>Our Secret Island Boat Tour Is Just for You</li>
          <li>Chill and Escape in Our Natural Shelters</li>
          <li>September in RK Hotel</li>
          <li>Live Music Concerts</li>
        </ul>
      </div>

      <div class="box">
        <h3>For Customers</h3>
        <ul>
          <li>About RK Hotel</li>
          <li>Customer Care/Help</li>
          <li>Corporate Accounts</li>
          <li>Financial Information</li>
          <li>Terms & Conditions</li>
        </ul>
      </div>

      <div class="box">
        <h3>Contact Us</h3>

        <ul>
          <li>Rk Hotel Resort</li>
          <li><i class="far fa-envelope"></i>rkhotel32@gmail.com </li>
          <li><i class="far fa-phone-alt"></i>+977 9800001121 </li>
          <li><i class="far fa-phone-alt"></i>078 5674325 </li>
          <li><i class="far fa-comments"></i>24/ 7 Customer Services </li>
        </ul>
      </div>
    </div>
  </footer>
@endsection