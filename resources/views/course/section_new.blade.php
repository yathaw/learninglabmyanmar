<x-backend>
	<div class="row mb-2 mb-xl-3">
		<div class="col-auto d-none d-sm-block">
			<h3><strong> {{ $course->title }} </strong> </h3>
		</div>
		@if(!$sections->isEmpty())
		<div class="col-auto ml-auto text-right mt-n1">
			<a href="javascript:void(0)" class="btn custom_primary_btnColor float-right new" data-toggle="modal" data-target="#newsectionModal" data-id="{{$course->id}}"><i class="align-middle fas fa-plus"></i> Add New Section </a>
		</div>
		@endif
	</div>

	@if($sections->isEmpty())

	<div class="row">
		<div class="col-12">
			<div class="card">
				<div class="card-body">
					<div class="row justify-content-center">
						<div class="col-xl-3 col-lg-3 col-md-6 col-sm-10 col-10 py-5">
							<svg id="fc1f5aea-a643-4136-ad0f-c5867679d735" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1075.56483 723"><title>add_file</title><rect x="618.01845" y="721" width="457.54639" height="2" fill="#3f3d56"/><rect x="583.01845" y="692" width="457.54639" height="2" fill="#3f3d56"/><rect x="438.01845" y="663" width="457.54639" height="2" fill="#3f3d56"/><path d="M391.4699,664.07646c-2.77441,0-5.57715-.04394-8.32813-.12988l.0625-1.99805c3.9502.12305,7.98145.15723,11.9502.10254l.02734,2Q393.32879,664.076,391.4699,664.07646Zm15.74512-.46387-.11719-1.99609c3.95605-.2334,7.96289-.56152,11.90918-.97461l.209,1.98828C415.23943,663.04717,411.20232,663.37822,407.215,663.61259Zm-36.09571-.31152c-3.98925-.30566-8.0205-.70605-11.98242-1.19238l.24414-1.98438c3.93164.48145,7.93164.87989,11.89063,1.18262Zm60.03907-2.19922-.29981-1.97656c3.93067-.59668,7.8916-1.28906,11.76953-2.05957l.38965,1.96094C439.10955,659.803,435.11931,660.50127,431.15838,661.10185Zm-83.93506-.73144c-3.94092-.668-7.91895-1.43555-11.82324-2.28321l.42431-1.95507c3.87451.84179,7.82178,1.60351,11.73291,2.26562Zm107.54834-3.96192-.48047-1.9414c3.8584-.9541,7.73828-2.00879,11.53223-3.13379l.56835,1.918C462.56853,654.38506,458.65935,655.44756,454.77166,656.40849ZM323.69549,655.262c-3.86573-1.02832-7.75586-2.15918-11.5625-3.36328l.60253-1.90625c3.77784,1.19433,7.63819,2.3164,11.47364,3.33594Zm154.1582-5.70117-.65625-1.88867c3.74414-1.30176,7.50976-2.709,11.19433-4.1836l.74219,1.85742C485.42205,646.83134,481.62713,648.24931,477.85369,649.56084Zm-177.14551-1.56641c-3.75439-1.37988-7.53223-2.86914-11.22754-4.42578l.77637-1.84375c3.667,1.54492,7.41553,3.02246,11.1416,4.39258Zm199.47461-7.36816-.82812-1.82032c3.5957-1.63378,7.21-3.37793,10.74218-5.18359l.91016,1.78125C507.44744,637.223,503.80584,638.97978,500.18279,640.62627Zm21.39844-10.93848-.99024-1.73633c3.44825-1.96777,6.89063-4.03613,10.2295-6.14844l1.06835,1.68946C528.52459,625.62138,525.05681,627.70634,521.58123,629.68779Zm20.32324-12.85742-1.14453-1.63867c3.24707-2.26856,6.4873-4.64453,9.63086-7.06055l1.21875,1.58594C548.44256,612.15166,545.17693,614.54521,541.90447,616.83037ZM237.07879,614.014c-3.228-2.34472-6.45264-4.80078-9.585-7.30176l1.248-1.5625c3.1084,2.48145,6.3086,4.91895,9.51172,7.24512Zm323.90283-11.8457-1.28906-1.5293c3.02636-2.55371,6.03808-5.21484,8.95312-7.91015l1.35742,1.46875C567.06658,596.91338,564.03142,599.595,560.98162,602.16826Zm-342.728-3.18555c-3.00635-2.63281-5.99316-5.37109-8.87695-8.13965l1.38476-1.44336c2.86231,2.748,5.82618,5.46582,8.80957,8.07911Zm360.40088-13.16113-1.42383-1.4043c2.79-2.82715,5.54981-5.75293,8.20117-8.69531l1.48633,1.33789C584.24627,580.02568,581.466,582.973,578.65447,585.82158Zm-377.77295-3.51172c-2.7583-2.90039-5.48242-5.89844-8.09668-8.91016l1.51074-1.31054c2.59424,2.98926,5.29737,5.96386,8.03516,8.84179ZM594.77459,567.93l-1.54492-1.26953c2.5205-3.06739,5.00195-6.23243,7.37792-9.40918l1.60157,1.19726C599.8156,561.6497,597.31463,564.84013,594.77459,567.93Zm-409.6709-3.79688c-2.477-3.12988-4.916-6.36133-7.24951-9.60449l1.623-1.168c2.31592,3.21778,4.73633,6.42481,7.19483,9.53223ZM609.2033,548.636l-1.6543-1.123c2.23047-3.28418,4.415-6.66407,6.49219-10.04786l1.70508,1.04688C613.65154,541.92119,611.45037,545.32744,609.2033,548.636Zm-438.15088-4.02929c-2.1792-3.34082-4.312-6.77832-6.33984-10.21973l1.72265-1.01563c2.0127,3.415,4.1294,6.82715,6.292,10.14161ZM621.81853,528.096l-1.75-.96679c1.91992-3.47461,3.78516-7.043,5.5459-10.60645l1.793.88672C625.634,520.99931,623.7531,524.595,621.81853,528.096ZM632.4992,506.4749l-1.832-.80273c1.59375-3.63965,3.124-7.36719,4.54882-11.07813l1.86719.7168C635.64763,499.05107,634.10467,502.80693,632.4992,506.4749Zm-483.90235-4.31543c-1.5332-3.67969-3.00146-7.44434-4.36377-11.19043l1.87989-.68359c1.35156,3.71777,2.80859,7.45312,4.32959,11.10449Zm492.55078-18.21582-1.89843-.62891c1.248-3.76074,2.42578-7.60449,3.5-11.42578l1.92578.541C643.592,476.28056,642.40447,480.15459,641.14763,483.94365Zm-500.76709-4.38281c-1.18994-3.81153-2.3081-7.70508-3.32324-11.57422l1.93457-.50781c1.00733,3.83984,2.11719,7.7041,3.29785,11.48632Zm507.28565-18.79492-1.94824-.45313c.8955-3.85449,1.71386-7.791,2.43359-11.69824l1.9668.36133C649.39373,452.91435,648.56853,456.88017,647.66619,460.76592Zm-513.394-4.49415c-.834-3.90625-1.58887-7.88574-2.24317-11.83007l1.97266-.32813c.6499,3.915,1.39892,7.86426,2.22656,11.74024Zm517.75244-19.18359-1.98242-.27148c.53808-3.917.99218-7.91114,1.35058-11.87207l1.99219.17968C653.02361,429.1165,652.5656,433.14092,652.02459,437.08818Zm-521.69385-4.56641c-.47168-3.959-.85889-7.99121-1.15137-11.98437l1.99512-.14648c.28955,3.96386.67432,7.96484,1.14258,11.89453Zm523.86865-19.40918-1.99805-.08984c.17774-3.96289.26856-7.98242.26856-11.94629h2C654.4699,405.0706,654.37908,409.12041,654.19939,413.11259Zm-525.626-4.60156c-.06836-2.45215-.103-4.9541-.10352-7.43457q0-2.30859.03955-4.6084l2,.03516q-.03955,2.28222-.03955,4.57324c.00049,2.46192.03516,4.94531.10254,7.37988Zm2.41064-23.94775-1.99609-.125c.24951-3.9961.59423-8.03223,1.02343-11.99658l1.98828.21533C131.57342,376.5916,131.23211,380.597,130.98406,384.56328Zm520.19445-12.20159c-.39941-3.94287-.94884-5.86531-1.52892-9.79109l1.97851-.292c.584,3.95557,1.085,6.9751,1.48828,10.94775Zm-517.6217-11.55134-1.97656-.30567c.61279-3.95654,1.32471-7.94433,2.11621-11.854l1.96.39649C134.87127,352.92705,134.16472,356.88457,133.55681,360.81035ZM647.631,350.79472c-.76269-3.90136-1.623-7.82861-2.55859-11.67236l1.94336-.47266c.94238,3.873,1.80957,7.83057,2.57812,11.76123ZM138.29412,337.39336l-1.93994-.48633c.97119-3.87354,2.04687-7.7793,3.19726-11.60938l1.915.5752C140.32537,329.67363,139.258,333.54961,138.29412,337.39336Zm503.68457-9.81348c-1.11524-3.80811-2.334-7.63867-3.62207-11.38672l1.89062-.65039c1.29883,3.77686,2.52735,7.6377,3.65137,11.47461Zm-496.79981-13.1001-1.88671-.66308c1.3291-3.78077,2.76416-7.57959,4.26513-11.291l1.85449.75C147.92205,306.9583,146.49773,310.72832,145.17888,314.47978Zm489.03321-9.49463c-1.459-3.68066-3.02149-7.37451-4.64453-10.97949l1.82421-.82129c1.63575,3.63281,3.21,7.355,4.67969,11.06348ZM154.15545,292.28252l-1.81739-.835c1.67041-3.6377,3.44825-7.28565,5.28418-10.84229l1.77735.917C157.57732,285.05205,155.81316,288.67217,154.15545,292.28252ZM624.424,283.24687c-1.79-3.53076-3.68652-7.06885-5.63672-10.51465l1.74024-.98535c1.96582,3.47266,3.876,7.0376,5.67968,10.59571ZM165.1325,271.01738l-1.7334-.998c1.99512-3.46435,4.09912-6.93213,6.25391-10.30615l1.68554,1.07617C169.20037,264.138,167.112,267.57939,165.1325,271.01738Zm447.5415-8.53516c-2.11328-3.36425-4.32617-6.71582-6.57715-9.96191l1.64258-1.13965c2.26856,3.271,4.499,6.648,6.62793,10.03809ZM178.00554,250.85869l-1.63476-1.15235c2.30566-3.27,4.71631-6.52929,7.1665-9.6875l1.58008,1.22559C182.68621,244.3792,180.29314,247.61357,178.00554,250.85869Zm421.064-7.99219c-2.41016-3.15674-4.91992-6.29492-7.46192-9.32715l1.53321-1.28467c2.56054,3.05567,5.08984,6.21729,7.51855,9.39795ZM192.65886,231.96758l-1.52246-1.29688c2.58741-3.03906,5.28418-6.064,8.01514-8.99072l1.46191,1.36426C197.90349,225.949,195.22722,228.95146,192.65886,231.96758Zm391.06983-7.40821c-2.68652-2.92431-5.47363-5.82275-8.28223-8.61377l1.41016-1.41894c2.83008,2.813,5.63769,5.73291,8.34472,8.6792Zm-374.76514-10.064-1.39844-1.42969c2.85987-2.79785,5.81934-5.564,8.79541-8.22119l1.332,1.49219C214.73894,208.97343,211.80193,211.71855,208.96355,214.49541Zm357.81787-6.77979c-2.94433-2.67041-5.98437-5.3042-9.03515-7.82812l1.27539-1.541c3.07324,2.543,6.13672,5.19678,9.10351,7.8877Zm-339.99951-9.13183-1.26269-1.55079c3.09326-2.519,6.29-5.00341,9.502-7.38427l1.19141,1.60644C233.02459,193.61845,229.85174,196.08379,226.78191,198.58379ZM245.964,184.3665l-1.11621-1.65918c3.31055-2.22754,6.71875-4.40869,10.13037-6.48437l1.03906,1.709C252.632,179.9915,249.24968,182.15654,245.964,184.3665Zm20.3877-12.40137-.96-1.75488c3.50245-1.9165,7.09375-3.77588,10.67383-5.52734l.87891,1.79687C273.39177,168.21758,269.82781,170.06279,266.35174,171.96513Zm241.37011-4.63379c-3.55859-1.77294-7.2041-3.48584-10.835-5.09082l.8086-1.8291c3.65918,1.61719,7.333,3.34326,10.91894,5.12989Zm-219.94824-5.84423-.79492-1.835c3.66015-1.58643,7.4043-3.10791,11.12793-4.52247l.71,1.87012C295.12127,158.40312,291.40593,159.91289,287.77361,161.48711Zm198.05176-3.83448c-3.70313-1.436-7.49317-2.80615-11.26563-4.07177l.63672-1.89649c3.80078,1.27588,7.62012,2.65625,11.35156,4.104ZM310.0822,153.01592l-.623-1.9004c3.80078-1.24609,7.67871-2.41943,11.52539-3.48632l.53467,1.92675C317.70183,150.615,313.85369,151.7791,310.0822,153.01592Zm153.06348-2.97364c-3.81445-1.0874-7.70508-2.1001-11.56348-3.00976l.459-1.94629c3.88867.9165,7.80859,1.937,11.65332,3.03222Zm-130.0415-3.41553-.44532-1.9497c3.89649-.89014,7.86573-1.70117,11.79688-2.41016l.35547,1.96778C340.90935,144.93877,336.97088,145.74345,333.10418,146.62675Zm106.78759-2.06689c-3.89453-.731-7.86132-1.38135-11.791-1.93311l.27734-1.98046c3.96.55615,7.958,1.21142,11.88282,1.94775Zm-83.27539-2.17627-.26464-1.98242c3.959-.52832,7.98535-.97266,11.96679-1.31934l.17383,1.99219C364.54119,141.41875,360.54607,141.85918,356.61638,142.38359Zm59.61621-1.14746c-3.93945-.37109-7.94921-.65723-11.91894-.84912l.09766-1.99805c3.999.19385,8.03906.48194,12.00878.856Zm-35.81445-.9292-.084-1.99805c3.67578-.15332,7.42187-.23144,11.13574-.23242l.90527.00147-.00586,2-.89941-.00147C387.78435,140.07744,384.0656,140.15508,380.41814,140.30693Z" transform="translate(-62.21758 -88.5)" fill="#3f3d56"/><path d="M840.67851,321.86169l-5,34s-22,44-8,89l18-11s14-54,14-58,6-51,6-51Z" transform="translate(-62.21758 -88.5)" fill="#ffb9b9"/><path d="M850.67851,430.86169l-24,16,12,59s3,80,2,83-19,125-19,125,21,10,40,4c0,0,19-90,19-116l22-91,34,104s2,70,6,93,4,26,4,26,32,9,40,0c0,0-4-118-7-130l-7-143Z" transform="translate(-62.21758 -88.5)" fill="#2f2e41"/><path d="M829.67851,713.86169s-2-3-8,5-25,23-25,23-52,37-13,39,46-18,46-18,33-6,34-13-4-35-4-35Z" transform="translate(-62.21758 -88.5)" fill="#2f2e41"/><path d="M948.67851,731.86169s-7,24-5,34-4,47,24,44,19-35,19-35l-9-41Z" transform="translate(-62.21758 -88.5)" fill="#2f2e41"/><circle cx="846.96093" cy="86.86169" r="33" fill="#ffb9b9"/><path d="M889.67851,192.86169s10,35,2,48,54,2,58-10c0,0-20-22-17-43Z" transform="translate(-62.21758 -88.5)" fill="#ffb9b9"/><path d="M905.67851,239.86169s27.37436,1.85067,40.68718-13.07466l49.31282,21.07466-21,116s42,98,4,107-148,0-143-33,25-73,25-73,5-44-6-64-4-43-4-43l44.01771-29.16492S896.67851,239.86169,905.67851,239.86169Z" transform="translate(-62.21758 -88.5)" fill="#575a89"/><path d="M862.67851,258.86169h-12s-14,3-11,41l-7,27s35,9,40,4S862.67851,258.86169,862.67851,258.86169Z" transform="translate(-62.21758 -88.5)" fill="#575a89"/><path d="M1007.67851,318.86169l-4,35s5,46-12,82l-6,18s-6,52-22,52,0-59,0-59l8-59s6-23,2-33-5-31-5-31Z" transform="translate(-62.21758 -88.5)" fill="#ffb9b9"/><path d="M901.07105,153.76852a131.94458,131.94458,0,0,1,14.78673-1.466c3.58835-.15247,7.32673-.1282,10.56938,1.41606,4.88924,2.32843,7.62859,7.59193,9.42207,12.70169s3.06553,10.5704,6.39255,14.84324c5.53567-5.77823,6.6419-14.36872,7.46608-22.32814.5797-5.59838,1.0935-11.56786-1.49506-16.56559-1.59435-3.07822-4.22488-5.477-6.88936-7.6947-12.71968-10.5866-28.87449-18.9168-45.25168-16.539l-.38319,2.52845a45.15654,45.15654,0,0,0-8.3538.525l.58517,6.273-8.69907.55181-.33371,6.53769-8.79749.305a10.19308,10.19308,0,0,0,3.06878,6.62727,12.39174,12.39174,0,0,1-4.51864,2.041c1.467,5.679,2.89109,11.371,4.40664,17.03723,1.11643,4.174.917,7.86191,5.39409,5.82489,3.40879-1.551,5.71522-6.48311,9.16152-8.52087C891.66224,155.4659,896.46744,154.48866,901.07105,153.76852Z" transform="translate(-62.21758 -88.5)" fill="#2f2e41"/><path d="M981.67851,248.86169h14s23,77,19,78-51,4-51,4Z" transform="translate(-62.21758 -88.5)" fill="#575a89"/><circle cx="323.96093" cy="307.86169" r="81" fill="#f9a826"/><polygon points="374.961 299.862 331.961 299.862 331.961 256.862 315.961 256.862 315.961 299.862 272.961 299.862 272.961 315.862 315.961 315.862 315.961 358.862 331.961 358.862 331.961 315.862 374.961 315.862 374.961 299.862" fill="#fff"/><rect x="71.60851" y="444.68968" width="110.15278" height="128.33333" fill="#f2f2f2"/><path d="M286.75665,662.59246h-154v-154h154Zm-151.86111-2.13889H284.61776V510.73135H134.89554Z" transform="translate(-62.21758 -88.5)" fill="#3f3d56"/><rect x="102.6224" y="465.00912" width="94.11111" height="2.13889" fill="#3f3d56"/><rect x="102.6224" y="488.5369" width="94.11111" height="2.13889" fill="#3f3d56"/><rect x="102.6224" y="512.06468" width="94.11111" height="2.13889" fill="#3f3d56"/><rect x="224.79164" y="22.83459" width="222" height="110.16541" fill="#f2f2f2"/><path d="M554.00922,222.5h-268V88.5h268Zm-266-2h264V90.5h-264Z" transform="translate(-62.21758 -88.5)" fill="#3f3d56"/><rect x="263.8224" y="55.91699" width="143.93848" height="2" fill="#3f3d56"/><rect x="263.8224" y="76.91699" width="143.93848" height="2" fill="#3f3d56"/><rect x="263.8224" y="97.91699" width="143.93848" height="2" fill="#3f3d56"/><rect x="529.96093" y="300.86169" width="95" height="101" fill="#f2f2f2"/><path d="M711.17851,491.36169h-120v-120h120Zm-118-2h116v-116h-116Z" transform="translate(-62.21758 -88.5)" fill="#3f3d56"/><rect x="544.46093" y="337.36169" width="66" height="2" fill="#3f3d56"/><rect x="544.46093" y="350.36169" width="66" height="2" fill="#3f3d56"/><rect x="544.46093" y="363.36169" width="66" height="2" fill="#3f3d56"/><rect x="129.01845" y="132" width="457.54639" height="2" fill="#3f3d56"/><rect x="463.46093" y="400.86169" width="251" height="2" fill="#3f3d56"/><rect y="572.86169" width="295.07814" height="2" fill="#3f3d56"/></svg>

						</div>
					</div>

					<div class="row justify-content-center text-center">

						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-10 col-10">
							<h3 class="mt-5"> No Video Lecture in this course. </h3>
							<p class="my-4 text-muted"> Before you create a video, you must configure at least one sections. </p>
							<a href="javascript:void(0)" class="btn custom_primary_btnColor emptystateBtn" data-id="{{$course->id}}"><i class="align-middle fas fa-plus"></i> Add New Section </a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
<div class="modal fade" id="newsectionModal" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
					<div class="modal-content ">
						<div class="modal-header">
							<h5 class="modal-title"> New Section </h5>
							<button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
						</div>
						<form method="post" action="{{route('backside.section.store')}}" enctype="multipart/form-data">
							<input type="hidden" name="courseid" value="{{ $course->id }}">
							@csrf
							<div class="modal-body m-3">
								<div class="row mb-3">
									<label for="titleId" class="col-sm-2 col-form-label"> Title </label>
									<div class="col-sm-10">
										<input type="text" class="form-control" id="titleId" placeholder="Enter Title" name="title">
									</div>
								</div>

								<div class="row mb-3">
									<label for="objectiveId" class="col-sm-2 col-form-label"> Objective </label>
									<div class="col-sm-10">
										<textarea class="form-control" id="objectiveId" name="objective"></textarea>
										<small> What will students be able to do at the end of this section? </small>
									</div>
								</div>

								<div class="row mb-3">
									<label for="objectiveId" class="col-sm-2 col-form-label"> Content Type </label>
									<div class="col-sm-10">
										<select class="form-control select2" name="contenttype">
											@foreach($contenttypes as $contenttype)
											<option value="{{$contenttype->id}}">{{$contenttype->name}}</option>
											@endforeach
										</select>
									</div>
								</div>


								@php
								$authuser=Auth::user();
								$role = $authuser->getRoleNames();
	                       $instructor_companyid=$authuser->company_id;   //null
	                       //var_dump($instructor);
	                       //die();
	                       @endphp
	                       @if($instructor_companyid != Null || $role[0]=='Admin')

	                       <div class="row mb-3">
	                       	<label for="objectiveId" class="col-sm-2 col-form-label"> Instructor </label>
	                       	<div class="col-sm-10">
	                       		<select class="form-control select2" name=instructor>
	                       			@foreach($instructors as $instructor)
	                       			@foreach($instructor->courses as $instructor_course)
	                       			@if($instructor_course->pivot->course_id == $course->id)
	                       			<option value="{{$instructor->id}}">{{$instructor->user->name}}</option>
	                       			@endif
	                       			@endforeach
	                       			@endforeach
	                       		</select>
	                       	</div>
	                       </div>

	                       @endif

	                   </div>

	                   <div class="modal-footer">
	                   	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
	                   	<button type="submit" class="btn btn-primary">Save changes</button>
	                   </div>
	               </form>
	           </div>
	       </div>
	   </div>
	@else
	<div class="row">
		<div class="col-12">
			<div class="accordion" id="accordionExample">
				<ul class="list-unstyled section_sortable">
					@php $i=1; @endphp
					@foreach($sections as $section)
					@if($section->course_id == $course->id)

					<li class="section_sort" data-id="{{$section->id}}" data-sorting="{{ $section->sorting }}">
						<div class="card my-2 border border-warning">

							<div class="card-header" id="headingOne">
								<h5 class="card-title my-2">
									<div class="row">
										<div class="col-1 d-flex align-items-center justify-content-center">
											<i class="fas fa-bars handle"></i>
										</div>
										<div class="col-7">
											<a href="#" data-toggle="collapse" data-target="#row{{$i}}" aria-expanded="false" aria-controls="row{{$i}}">
												<b class="fontbold"> Section <span class="sectionNo">{{$i}}</span> : </b>{{$section->title}}

												<small class="d-block mt-2">{{$section->objective}}</small>
											</a>
										</div>
										<div class="col-3 d-flex align-items-center justify-content-center">
											<span  data-toggle="tooltip" data-placement="top" title="Create New Lecture Lesson in that section">
												<a href="#" class="btn btn-light btn-sm text-success contentbtn" data-toggle="modal" data-id={{$section->id}}>
													<i class="align-middle fas fa-plus"></i> Content 
												</a>
											</span>

											<a href="#" class="btn btn-light custom_primary_Color btn-sm editbtn" data-placement="top" title="Edit this section" data-toggle="modal" data-target="#editsectionModal" data-id={{$section->id}}>  
												<i class="align-middle mr-2" data-feather="edit-2"></i> Edit 
											</a>

											<form method="post" action="{{ route('backside.section.destroy',$section->id) }}" class="d-inline-block" onsubmit="return confirm('Are you Sure want to Delete?')">
												@csrf
												@method('DELETE')

												<button class="btn btn-light text-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Remove this section" type="submit"> 
													<i class="align-middle mr-2" data-feather="x"></i>  Remove 
												</button>
											</form>

												{{-- <a href="" class="btn btn-light text-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Remove this section">  
													<i class="align-middle mr-2" data-feather="x"></i>  Remove 
												</a> --}}
											</div>
										</div>
										
									</h5>
								</div>

								<div id="row{{$i}}" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
									<div class="card-body">
										<div class="row">
											<ul class="list-unstyled lecture_sortable" data-sid="{{$section->id}}">   

												@foreach($contents as $content)
												@if($content->section_id  == $section->id)
												

												<li class="lecture_sort" data-sid="{{$section->id}}" data-id="{{$lesson->id}}">
													<div class="col-12 my-2">
														<div class="card bg-light border">
															<div class="card-body">
																<div class="row">
																	<div class="col-1 d-flex align-items-center justify-content-center">
																		<i class="fas fa-bars handle"></i>
																	</div>
																	<div class="col-11">

																		<h5 class="d-inline-block"> 
																			<b class="fontbold">{{$content->title}}<span class="lectureNo1"> </span> : 
																				{{$content->description}}</b>
																				
																			</h5>
																			<a href="" class="btn btn-light text-info">  
																				<i class="align-middle mr-2" data-feather="info"></i> Detail 
																			</a>

																			<a href="" class="btn btn-light custom_primary_Color lessoneditbtn" data-toggle="modal" data-id={{$content->id}}>  
																				<i class="align-middle mr-2" data-feather="edit-2"></i> Edit 
																			</a>

																			{{-- <form method="post" action="{{ route('backside.content.destroy',$content->id) }}" class="d-inline-block" onsubmit="return confirm('Are you Sure want to Delete?')">
																				@csrf
																				@method('DELETE')

																				<button class="btn btn-light text-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Remove this section" type="submit"> 
																					<i class="align-middle mr-2" data-feather="x"></i>  Remove 
																				</button>
																			</form> --}}

																			<a href="" class="btn btn-light text-danger deletebtn" data-id={{$content->id}}>  
																				<i class="align-middle mr-2" data-feather="x"></i>  Remove 
																			</a>
																		</div>

																	</div>
																</div>
															</div>
														</div>
													</li>
													
													@endif
													@endforeach
												</ul>
											</div>
											{{-- {!! $contents->links() !!} --}}
										</div>
									</div>

								</div>
							</li>
							@endif
							@php $i++; @endphp
							@endforeach

						</ul>
					</div>

				</div>

			</div>

			<!-- New Section Modal -->
			

	   @endif

   <!-- New Content Modal -->
   <div class="modal fade" id="newcontentModal" tabindex="-1" role="dialog" aria-hidden="true">
   	<div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
   		<div class="modal-content ">
   			<div class="modal-header">
   				<h5 class="modal-title"> New Content </h5>
   				<button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
   			</div>
   			<form method="post" action="{{route('backside.content.store')}}" enctype="multipart/form-data">
   				<input type="hidden" name="sectionid" id="sectionid">
   				@csrf
   				<div class="modal-body m-3">
   					<div class="row mb-3">
   						<label for="titleId" class="col-sm-2 col-form-label"> Title </label>
   						<div class="col-sm-10">
   							<input type="text" class="form-control" id="titleId" placeholder="Enter Title" name="content_title">
   						</div>
   					</div>

   					<div class="row mb-3">
   						<label for="objectiveId" class="col-sm-2 col-form-label"> Description </label>
   						<div class="col-sm-10">
   							<textarea class="form-control" id="objectiveId" name="content_description"></textarea>
   							<small> What will students be able to do at the end of this section? </small>
   						</div>
   					</div>

   					<div class="row mb-3">
   						<label for="objectiveId" class="col-sm-2 col-form-label"> Content Type </label>
   						<div class="col-sm-10">
   							<select class="form-control select2" name="contenttypeid">
   								@foreach($contenttypes as $contenttype)
   								<option value="{{$contenttype->id}}">{{$contenttype->name}}</option>
   								@endforeach
   							</select>
   						</div>
   					</div>

   					<div class="row mb-3">
   						<label for="objectiveId" class="col-sm-2 col-form-label">Video(<small class="text-danger">mp4</small>)</label>
   						<div class="col-sm-10">
   							<input type="file" name="file" accept="video/*">
   						</div>
   					</div>

   					<div class="row mb-3">
   						<label for="objectiveId" class="col-sm-2 col-form-label">File </label>
   						<div class="col-sm-10">
   							<input type="file" name="file_upload" accept=".xlsx,.xls,image/*,.doc, .docx,.ppt,.pptx,.txt,.pdf">
   						</div>
   					</div>

   				</div>
   				<div class="modal-footer">
   					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
   					<button type="submit" class="btn btn-primary">Save changes</button>
   				</div>
   			</form>
   		</div>
   	</div>
   </div>

   {{-- Edit Section Modal kyw --}}

    <div class="modal fade" id="editsectionModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
			<div class="modal-content ">
				<div class="modal-header">
					<h5 class="modal-title">Edit Section </h5>
					<button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
				</div>
				<form id="editsectionform">
					<input type="hidden" name="courseid" id="updatecourseid" >
					<input type="hidden" name="sectionid" id="updatesectionid">

					{{-- <input type="hidden" name="instructorid" id="updateinstructorid" > --}}


					@php
					$authuser = Auth::user();
					$role = $authuser->getRoleNames();

	        			if ($role[0] == 'Instructor') {
	        			$instructor = $authuser->instructor;
	        			$instructorid= $instructor->id;
	        		}else{
	        			$instructorid = NULL;
	        		}
					@endphp
					{{-- <input type="hidden" name="instructorid" id="updateinstructorid" value="{{$instructorid}}"> --}}
					{{-- @csrf
					@method('PUT') --}}

					<div class="modal-body m-3">
						<div class="row mb-3">
							<label for="titleEdit" class="col-sm-2 col-form-label"> Title </label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="titleEdit" name="title">
							</div>
						</div>

						<div class="row mb-3">
							<label for="objectiveEdit" class="col-sm-2 col-form-label"> Objective </label>
							<div class="col-sm-10">
								<textarea class="form-control" id="objectiveEdit" name="objective"></textarea>
								<small> What will students be able to do at the end of this section? </small>
							</div>
						</div>

						<div class="row mb-3">
							<label for="objectiveId" class="col-sm-2 col-form-label"> Content Type </label>
							<div class="col-sm-10">
								<select class="form-control select2" name="contenttype" id="contenttypeEdit">
									
								</select>
							</div>
						</div>

					   {{-- @php
                       $authuser=Auth::user();
					   $role = $authuser->getRoleNames();
                       $instructor_companyid=$authuser->company_id; 
                       @endphp
                       @if($instructor_companyid != Null || $role[0]=='Admin') --}}
                      
						<div class="row mb-3">
						    <label for="objectiveId" class="col-sm-2 col-form-label">Instructor</label>
						    <div class="col-sm-10">
						    	<select class="form-control select2" name="instructor" id="instructorEdit">
						    		
						    	</select>
						    </div>
						</div>
						
						{{-- @endif --}}


					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						<button type="submit" class="btn btn-primary" id="sectionupdate">Update changes</button>
					</div>
				</form>
			</div>
		</div>
	</div>


	<div class="modal fade" id="editcontentModal" tabindex="-1" role="dialog" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered  modal-lg" role="document">
			<div class="modal-content ">
				<div class="modal-header">
					<h5 class="modal-title">Edit Content </h5>
					<button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
				</div>
				<form id="editcontentform">


					<input type="hidden" name="contentid" id="updatecontentid">
					<input type="hidden" name="content_sectionid" id="content_sectionid">

					<div class="modal-body m-3">
						<div class="row mb-3">
							<label for="content_title" class="col-sm-2 col-form-label"> Title </label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="content_title" placeholder="Enter Title" name="content_title">
							</div>
						</div>

						<div class="row mb-3">
							<label for="content_description" class="col-sm-2 col-form-label"> Description </label>
							<div class="col-sm-10">
								<textarea class="form-control" name="content_description" id="content_description"></textarea>
								<small> What will students be able to do at the end of this section? </small>
							</div>
						</div>


						<div class="row mb-3">
							<label for="objectiveId" class="col-sm-2 col-form-label"> Content Type </label>
							<div class="col-sm-10">
								<select class="form-control select2" name="contenttypeid" id="edit_contenttype">
									
								</select>
							</div>
						</div>

						{{-- <div class="row mb-3">
							<label for="objectiveId" class="col-sm-2 col-form-label"> Upload File </label>
							<div class="col-sm-10">
								<input type="file" name="file">
							</div>
						</div> --}}

						<div class="form-group row">
							<label for="photo_id" class="col-sm-2 col-form-label">Video(<small class="text-danger">mp4</small>)</label>
							<div class="col-sm-10">
								<ul class="nav nav-tabs" id="myTab" role="tablist">
									<li class="nav-item" role="presentation">
										<a class="nav-link active" id="oldPhoto-tab" data-toggle="tab" href="#oldPhotoTab" role="tab" aria-controls="oldPhotoTab" aria-selected="true"> Old Video </a>
									</li>

									<li class="nav-item" role="presentation">
										<a class="nav-link" id="newPhoto-tab" data-toggle="tab" href="#newPhotoTab" role="tab" aria-controls="newPhotoTab" aria-selected="false"> New Video</a>
									</li>
								</ul>
								<div class="tab-content mt-3" id="myTabContent">
									<div class="tab-pane fade show active" id="oldPhotoTab" role="tabpanel" aria-labelledby="oldPhoto-tab">
										<input type="hidden" name="hidden_file" id="hidden_file">
										<video class="js-player lesson_video_play video-js" width="220" height="140" controls crossorigin preload="auto" playsinline >
											<source src=" " type="video/mp4" id="content_file">
											</video>

											{{-- <img src=" " class="img-fluid w-25" id="content_file"> --}}
											
										</div>

										<div class="tab-pane fade" id="newPhotoTab" role="tabpanel" aria-labelledby="newPhoto-tab">
											<input type="file" id="file" name="file" >
										</div>
									</div>
								</div>
							</div>

							<div class="form-group row mt-2">
								<label for="photo_id" class="col-sm-2 col-form-label">File</label>
								<div class="col-sm-10">
									<ul class="nav nav-tabs" id="myTab" role="tablist">
										<li class="nav-item" role="presentation">
											<a class="nav-link active" id="oldPhoto-tab" data-toggle="tab" href="#oldPhotoTab1" role="tab" aria-controls="oldPhotoTab" aria-selected="true"> Old File </a>
										</li>

										<li class="nav-item" role="presentation">
											<a class="nav-link" id="newPhoto-tab1" data-toggle="tab" href="#newPhotoTab1" role="tab" aria-controls="newPhotoTab" aria-selected="false"> New File</a>
										</li>
									</ul>
									<div class="tab-content mt-3" id="myTabContent">
										<div class="tab-pane fade show active" id="oldPhotoTab1" role="tabpanel" aria-labelledby="oldPhoto-tab">
											{{-- <iframe src="" id="content_uploadfile"></iframe>
											 --}} 
											 <a href="" id="content_uploadfile">PDF File</a>
											{{-- <div id="showpdf"></div> --}}
											<input type="hidden" name="hidden_uploadfile" id="hidden_uploadfile">
										</div>

										<div class="tab-pane fade" id="newPhotoTab1" role="tabpanel" aria-labelledby="newPhoto-tab">
											<input type="file" id="file_upload" name="file_upload">
										</div>
									</div>
								</div>
							</div>


						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary">Update changes</button>
						</div>
					</form>
				</div>
			</div>
	</div>




		@section('script_content')
		<link rel="stylesheet" type="text/css" href="{{ asset('plugin/plyr/demo.css') }}">
		<script src="{{ asset('plugin/plyr/plyr_plugin.js') }}"></script>
		<script src="{{ asset('plugin/plyr/default.js') }}"></script>

		<script type="text/javascript">

			$(document).ready(function() {

				const player = Plyr.setup('.js-player',{
                // invertTime: false,
                i18n: {
                	rewind: 'Rewind 15s',
                	fastForward: 'Forward 15s',
                	seek: "Seek",
                	start: "Start",
                	end: "End",
                	seekTime : 10
                },
                controls: [
                    'play-large', // The large play button in the center
                    'restart', // Restart playback
                    'rewind', // Rewind by the seek time (default 10 seconds)
                    'play', // Play/pause playback
                    'fast-forward', // Fast forward by the seek time (default 10 seconds)
                    'progress', // The progress bar and scrubber for playback and buffering
                    'current-time', // The current time of playback
                    'mute', // Toggle mute
                    'volume', // Volume control
                    'captions', // Toggle captions
                    'settings', // Settings menu
                    'fullscreen', // Toggle fullscreen
                    'airplay'
                    ],
                    events: ["ended", "progress", "stalled", "playing", "waiting", "canplay", "canplaythrough", "loadstart", "loadeddata", "loadedmetadata", "timeupdate", "volumechange", "play", "pause", "error", "seeking", "seeked", "emptied", "ratechange", "cuechange", "download", "enterfullscreen", "exitfullscreen", "captionsenabled", "captionsdisabled", "languagechange", "controlshidden", "controlsshown", "ready", "statechange", "qualitychange", "adsloaded", "adscontentpause", "adscontentresume", "adstarted", "adsmidpoint", "adscomplete", "adsallcomplete", "adsimpression", "adsclick"],
                    listeners: {
                    	seek: function (e) {
                        // return false;    // required on v3
                    },
                    fastForward: 100
                },
                
                clickToPlay: true,
            });


				$.ajaxSetup({
					headers: {
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					}
				});

				$('.emptystateBtn').click(function(){
					var id = $(this).data('id');
					$('#sectionid').val(id);
					$('#newsectionModal').modal('show');

				})

				$(".section_sortable").sortable({
					containerSelector: "ul.section_sortable",
					itemSelector: "li.section_sort",
					handle: ".handle",
					placeholder:
					'<li><div class="card bg-primary text-white mb-1"><div class="card-header">Drop Here</div></div></li>',
					distance: 0,

					update: function(event, ui) {

						$('.section_sort').each(function(i) { 
							var id = $(this).data('id');

							var increaseId = $(this).index()+1;
			           	$(this).data('sorting', increaseId); // updates the data object
			           	$(this).attr('data-sorting', increaseId); // updates the attribute
			           	$(this).find('.sectionNo').html(increaseId);

			           	$.post("/sectionsorting_modernize",{id:id, sorting:increaseId},function (res) {

			           	});

			           });


					},


					onDrop: function($item, container, _super) {
					// console.log(id);
					$item.attr("style", null).removeClass("dragged");
					$("body").removeClass("dragging");
				}
			});

				$(".lecture_sortable").sortable({

					containerSelector: "ul.lecture_sortable",
					connectWith: $('.lecture_sortable'),

					itemSelector: "li.lecture_sort",
					handle: ".handle",
					placeholder:
					'<li><div class="card bg-primary text-white mb-1"><div class="card-header">Drop Here</div></div></li>',
					distance: 0,

					update: function(event, ui) {
						var ul_sectionid = ui.item.attr('data-sid');
						$('.lecture_sort').each(function(i) { 
							var li_sectionid = $(this).data('sid');

							var li_id = $(this).data('id');


							if (ul_sectionid == li_sectionid) {

								var increaseId = $(this).index()+1;

								console.log(li_sectionid);
				           $(this).data('id', increaseId); // updates the data object
				           $(this).attr('data-id', increaseId); // updates the attribute
				           $(this).find('.lectureNo'+ul_sectionid).html(increaseId);
				       }
				   });
					},

					onDrop: function($item, container, _super) {
					// console.log(id);
					$item.attr("style", null).removeClass("dragged");
					$("body").removeClass("dragging");
				}
			});

				$('.select2').select2({
					theme: 'bootstrap4',
				});


// ------------------------------------------ kyw---------------------------------------------------------------//
$('.editbtn').click(function(){
          	//alert('hi');
          	var id = $(this).data('id');
          	 //console.log(id);
          	 $.get('/backside/section/'+id+'/edit',function(response){
          	 //console.log(response.id);
          	 //console.log(response);
          	 $('#updatesectionid').val(response.id);
          	 $('#updatecourseid').val(response.course_id);
          	 
          	 $('#titleEdit').val(response.title);
          	 $('#objectiveEdit').text(response.objective);
          	 $('#contenttypeEdit').val(response.contenttype_id);
          	 $('#instructorEdit').val(response.instructor_id);

          	 var contenttypeid=response.contenttype_id;
          	 var instructorid=response.instructor_id;
          	 var courseid=response.course_id;
          	  	//console.log(contenttypeid);
          	  	$.post('/backside/section/getcontenttype',{contenttypeid:contenttypeid},function(res){
          	  		//console.log(res);
          	  		var html = "";
          	  		$.each(res,function (i,v) {
          	  			html +=`<option value="${v.id}"`;

          	  			if(v.id==contenttypeid)
          	  				html+=`selected`;

          	  			html+=`>${v.name}</option>`;

          	  		})

          	  		$('#contenttypeEdit').html(html);
          	  	})

          	  	$.post('/backside/getinstructor',{instructorid:instructorid,courseid:courseid},function(response){
          	  		console.log(response);

          	  		var html = "";
          	  		$.each(response,function (i,v) {
          	  			html +=`<option value="${v.instructor_id}"`;

          	  			if(v.instructor_id==instructorid)
          	  				html+=`selected`;

          	  			html+=`>${v.name}</option>`;

          	  		})

          	  		$('#instructorEdit').html(html);
          	  	})

          	  	$('#editsectionModal').modal('show');


          	  })

          	});

$('.contentbtn').click(function(){
	
	var id=$(this).data('id');
	
	//console.log(id);
	$.post('/backside/section/getsectionid',{id:id},function(response){
		//console.log(response.id);
		$('#sectionid').val(response.id);

	})
	$('#newcontentModal').modal('show');

});



$('.lessoneditbtn').click(function(){
	//alert('hi');
	var id=$(this).data('id');
	
	//console.log(id);
	$.post('/backside/content/getcontentid',{id:id},function(response){
		//console.log(response.id);
		$('#updatecontentid').val(response.id);
		$('#content_sectionid').val(response.section_id);
        
		$('#content_title').val(response.title);
		$('#content_description').val(response.description);
		var contenttypeid=response.contenttype_id;
		console.log(contenttypeid);

		$.post('/backside/content/getcontenttype',{contenttypeid:contenttypeid},function(res){
          	  		//console.log(res);
          	  		var html = "";
          	  		$.each(res,function (i,v) {
          	  			html +=`<option value="${v.id}"`;

          	  			if(v.id==contenttypeid)
          	  				html+=`selected`;

          	  			html+=`>${v.name}</option>`;

          	  		})

          	  		$('#edit_contenttype').html(html);
          	  	})

		var contentid=response.id;
		$.post('/backside/content/getlesson',{contentid:contentid},function(res){
			//console.log(res);
			var html = "";
			$.each(res,function (i,v) {
			//console.log(v.file);
			//console.log(v.file_upload);

			$('#hidden_file').val(v.file);
			var videoFile = v.file;
           // $('#content_file').attr('src', videoFile);

            $("#editcontentModal").on("shown.bs.modal", function(e) {
                console.log("modal opened" + $videoFile);
                $("#content_file").attr(
                    "src",
                    $videoFile + "?autoplay=1&showinfo=0&modestbranding=1&rel=0&mute=1"
                );
            });

            // stop playing the youtube video when I close the modal
            // $("#editcontentModal").on("hide.bs.modal", function(e) {
            //     // a poor man's stop video
            //     $("#content_file").attr("src", $videoFile);
            // });
            $('#hidden_uploadfile').val(v.file_upload);
            //$('#content_uploadfile').text(v.file_upload);

            var pdfFileupload = v.file_upload;
            $('#content_uploadfile').attr('href', pdfFileupload);

            
        })
			

		})
		

	})
	$('#editcontentModal').modal('show');


});


$('#editsectionform').on('submit',function(event){
	//alert('hi');
	event.preventDefault();
	var sectionid=$('#updatesectionid').val();
	var courseid=$('#updatecourseid').val();
	var instructorid=$('#instructorEdit').val();
	console.log(instructorid);
	var title=$('#titleEdit').val();
	var objective=$('#objectiveEdit').val();
	var contenttypeid=$('#contenttypeEdit').val();
	console.log(contenttypeid);
	$.ajax({
		url:'/backside/sectionupdate/'+sectionid,
		type:"POST",
		data:$('#editsectionform').serialize(),	
		dataType:'json',
		headers:{
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		success:function(response){
			$('#editsectionform').trigger("reset");
			$('#editsectionModal').modal('hide');
			window.location.reload(true);
		}

	})
});

$('.deletebtn').click(function(){
	//alert('hi');
	var ans=confirm('Are you Sure want to Delete?');
	// event.preventDefault();
	if(ans){
		var id=$(this).data('id');
	//console.log(id);
	$.ajax({
		url:'/backside/contentdelete/'+id,
		type:"DELETE",
		headers:{
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		success:function(response){
			//console.log(response);
			//window.location.reload(true);
			location.reload();
		}
	})
}
	
})

$('#editcontentform').on('submit',function(event){
	//alert('hi');
	event.preventDefault();
	var contentid=$('#updatecontentid').val();
	console.log(contentid);
	var sectionid=$('#content_sectionid').val();
	var title=$('#content_title').val();
	var objective=$('#content_description').val();
	var contenttypeid=$('#edit_contenttype').val();

	var videofile=$('#file').val();
	var fileupload=$('#file_upload').val();


	$.ajax({
		url:'/backside/contentupdate/'+contentid,
		type:"POST",
		data:$('#editcontentform').serialize(),	
		dataType:'json',
		headers:{
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		},
		success:function(response){
			$('#editcontentform').trigger("reset");
			$('#editcontentModal').modal('hide');
			window.location.reload(true);
		}

	})
});




});



</script>

@stop

</x-backend>