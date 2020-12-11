<x-frontend>

	<!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      	<div class="container">

        	<div class="d-flex justify-content-between align-items-center">
          		<h2> Shopping Cart</h2>
          		<ol>
            		<li><a href="{{ route('frontend.index') }}">Home</a></li>
            		<li> Shopping Cart</li>
          		</ol>
        	</div>

      	</div>
    </section><!-- End Breadcrumbs -->

    <section class="inner-page d-none">
      	<div class="container">
        
      
			<div class="section-title">
				<h2 class="text-center my-4"> <span class="course_count">  </span> ~ Courses in Cart</h2>
			</div>

			<div class="row mt-3">
				<input type="hidden" name="user_id" class="user_id" data-user_id = "{{Auth::id()}}">

				{{-- show cart --}}
				<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 order-xl-1 order-lg-1 order-md-1 order-sm-2 order-2 showcart">
				{{-- <span class="text-decoration-line-through text-muted"> 50,000 Ks </span> --}}

				</div>

				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 order-xl-2 order-lg-2 order-md-2 order-sm-1 order-1 mb-3">
					<h5 class="d-xl-block d-md-block d-sm-inline-block d-inline-block text-muted"> Total : </h5>

					{{-- total price --}}
					<h2 class="fw-bolder d-xl-block d-md-block d-sm-inline-block d-inline-block fontbold total"> </h2>


					{{-- <p class="text-decoration-line-through text-muted"> 50,000 Ks </p> --}}

					<div class="d-grid gap-2">
						<button class="btn btn-warning rounded-0 btn-lg text-white checkout" type="button"> Check Out </button>
					</div>
					
				</div>
			</div>


		</div>
    </section>

    <section class="inner-page pt-3">
      	<div class="container-fluid">
      		<div class="section-title pb-0">
				<h2 class="text-center my-4"> Thank you </h2>
				<p class="mmfont"> သင့်ထံ တရက်အတွင်း Learning Lab Myanmar Team မှ ဆက်သွယ်အကြောင်းကြားပေးပါမည်။ <br>၀ယ်ယူအားပေးမှုအတွက် အထူးကျေးဇူးတင်ပါသည်။ </p>
			</div>
			<div class="row d-flex align-items-center">
				<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12 order-xl-1 order-lg-1 order-md-1 order-sm-2 order-2 lh-lg pl-lg-5 pl-md-3">
					<p class="mmfont fs-5 lh-base mb-5"> ငွေပေးချေရန်အတွက် ဖော်ပြပါ Bank များမှ သင်အဆင်ပြေသည့် Bank မှငွေပေးချေနိုင်ပါသည်။ </p>
					<p class="mmfont fs-5 lh-base mb-5"> Bank Transfer နည်းလမ်းများအား Bank တခုစီတိုင်းတွင် အသေးစိတ်ဖော်ပြထားပါသည်။  </p>

					<p class="mmfont fs-5 lh-base mb-5"> ငွေလွဲပြီးလျှင် <span class="text-danger fw-bolder"> Slip </span> (သို့မဟုတ်)  <span class="text-danger fw-bolder"> Screen Shot </span> လေးကို Learning Lab Myanmar Page Messanger သို့ပို့ပေးရမည်ဖြစ်ပါသည်။ </p>
				
				</div>
				<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12 order-xl-2 order-lg-2 order-md-2 order-sm-1 order-1">
					<img src="{{ asset('externalphoto/phcall.gif') }}" class="img-fluid">
				</div>

			</div>
      	</div>

      	<div class="container mt-0">
      		<div class="row">
				<div class="col-12">
					<div id="narrow-browser-alert" class="alert alert-info text-center">
      					How to Transfer Money
      				</div>
				</div>
				
				<div class="col-12">
					<div class="sky-tabs sky-tabs-pos-top-left sky-tabs-anim-flip sky-tabs-response-to-icons">				
						<input type="radio" name="sky-tabs" checked id="sky-tab1" class="sky-tab-content-1">
						<label for="sky-tab1"><span><span> AYA Bank </span></span></label>
				
						<input type="radio" name="sky-tabs" id="sky-tab2" class="sky-tab-content-2">
						<label for="sky-tab2"><span><span><i class="icon-picture"></i>da Vinci</span></span></label>
				
						<input type="radio" name="sky-tabs" id="sky-tab3" class="sky-tab-content-3">
						<label for="sky-tab3"><span><span><i class="icon-cogs"></i>Einstein</span></span></label>
				
						<input type="radio" name="sky-tabs" id="sky-tab4" class="sky-tab-content-4">
						<label for="sky-tab4"><span><span><i class="icon-globe"></i>Newton</span></span></label>
				
						<label class="switcher"><span><span><a href="#"><i class="icon-reorder"></i>Tabs</a></span></span></label>
				
				<ul>
					<li class="sky-tab-content-1">					
						<div class="typography">
							<h1>Nikola Tesla</h1>
							<p>Serbian-American inventor, electrical engineer, mechanical engineer, physicist, and futurist best known for his contributions to the design of the modern alternating current (AC) electrical supply system.</p>
							<p>Tesla started working in the telephony and electrical fields before emigrating to the United States in 1884 to work for Thomas Edison. He soon struck out on his own with financial backers, setting up laboratories/companies to develop a range of electrical devices. His patented AC induction motor and transformer were licensed by George Westinghouse, who also hired Tesla as a consultant to help develop an alternating current system. Tesla is also known for his high-voltage, high-frequency power experiments in New York and Colorado Springs which included patented devices and theoretical work used in the invention of radio communication, for his X-ray experiments, and for his ill-fated attempt at intercontinental wireless transmission in his unfinished Wardenclyffe Tower project.</p>
							<p>Tesla's achievements and his abilities as a showman demonstrating his seemingly miraculous inventions made him world-famous. Although he made a great deal of money from his patents, he spent a lot on numerous experiments. He lived for most of his life in a series of New York hotels although the end of his patent income and eventual bankruptcy led him to live in diminished circumstances. Tesla still continued to invite the press to parties he held on his birthday to announce new inventions he was working and make (sometimes unusual) statements. Because of his pronouncements and the nature of his work over the years, Tesla gained a reputation in popular culture as the archetypal "mad scientist". He died in room 3327 of the New Yorker Hotel on 7 January 1943.</p>
							<p class="text-right"><em>Find out more about Nikola Tesla from <a href="http://en.wikipedia.org/wiki/Nikola_Tesla" target="_blank">Wikipedia</a>.</em></p>
						</div>
					</li>
					
					<li class="sky-tab-content-2">
						<div class="typography">
							<h1>Leonardo da Vinci</h1>
							<p>Italian Renaissance polymath: painter, sculptor, architect, musician, mathematician, engineer, inventor, anatomist, geologist, cartographer, botanist, and writer. His genius, perhaps more than that of any other figure, epitomized the Renaissance humanist ideal. Leonardo has often been described as the archetype of the Renaissance Man, a man of "unquenchable curiosity" and "feverishly inventive imagination". He is widely considered to be one of the greatest painters of all time and perhaps the most diversely talented person ever to have lived. According to art historian Helen Gardner, the scope and depth of his interests were without precedent and "his mind and personality seem to us superhuman, the man himself mysterious and remote". Marco Rosci states that while there is much speculation about Leonardo, his vision of the world is essentially logical rather than mysterious, and that the empirical methods he employed were unusual for his time.</p>
							<p>Born out of wedlock to a notary, Piero da Vinci, and a peasant woman, Caterina, at Vinci in the region of Florence, Leonardo was educated in the studio of the renowned Florentine painter, Verrocchio. Much of his earlier working life was spent in the service of Ludovico il Moro in Milan. He later worked in Rome, Bologna and Venice, and he spent his last years in France at the home awarded him by Francis I.</p>
							<p class="text-right"><em>Find out more about Leonardo da Vinci from <a href="http://en.wikipedia.org/wiki/Leonardo_da_Vinci" target="_blank">Wikipedia</a>.</em></p>
						</div>
					</li>
					
					<li class="sky-tab-content-3">
						<div class="typography">
							<h1>Albert Einstein</h1>
							<p>German-born theoretical physicist who developed the general theory of relativity, one of the two pillars of modern physics (alongside quantum mechanics). While best known for his mass–energy equivalence formula E = mc2 (which has been dubbed "the world's most famous equation"), he received the 1921 Nobel Prize in Physics "for his services to theoretical physics, and especially for his discovery of the law of the photoelectric effect". The latter was pivotal in establishing quantum theory.</p>
							<p>Near the beginning of his career, Einstein thought that Newtonian mechanics was no longer enough to reconcile the laws of classical mechanics with the laws of the electromagnetic field. This led to the development of his special theory of relativity. He realized, however, that the principle of relativity could also be extended to gravitational fields, and with his subsequent theory of gravitation in 1916, he published a paper on the general theory of relativity.</p>
							<p>He continued to deal with problems of statistical mechanics and quantum theory, which led to his explanations of particle theory and the motion of molecules. He also investigated the thermal properties of light which laid the foundation of the photon theory of light. In 1917, Einstein applied the general theory of relativity to model the large-scale structure of the universe.</p>
							<p class="text-right"><em>Find out more about Albert Einstein from <a href="http://en.wikipedia.org/wiki/Albert_Einstein" target="_blank">Wikipedia</a>.</em></p>
						</div>
					</li>
					
					<li class="sky-tab-content-4">
						<div class="typography">
							<h1>Isaac Newton</h1>
							<p>English physicist and mathematician who is widely regarded as one of the most influential scientists of all time and as a key figure in the scientific revolution. His book Philosophiæ Naturalis Principia Mathematica ("Mathematical Principles of Natural Philosophy"), first published in 1687, laid the foundations for most of classical mechanics. Newton also made seminal contributions to optics and shares credit with Gottfried Leibniz for the invention of the infinitesimal calculus.</p>
							<p>Newton's Principia formulated the laws of motion and universal gravitation that dominated scientists' view of the physical universe for the next three centuries. It also demonstrated that the motion of objects on the Earth and that of celestial bodies could be described by the same principles. By deriving Kepler's laws of planetary motion from his mathematical description of gravity, Newton removed the last doubts about the validity of the heliocentric model of the cosmos.</p>
							<p class="text-right"><em>Find out more about Isaac Newton from <a href="http://en.wikipedia.org/wiki/Isaac_Newton" target="_blank">Wikipedia</a>.</em></p>
						</div>
					</li>					
				</ul>
			</div>
				</div>
			</div>
      	</div>

      </section>


</x-frontend>