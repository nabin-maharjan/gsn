<?php
/**
 * Template Name: Register Page
 *
 * @package GSN
 * @since GSN 1.0
 */
 get_header();
 ?> 

 <div class="landing-hero-cntr" style="background-image:url('<?php echo get_template_directory_uri();?>/assets/images/bg.jpg'); padding-top:100px;">
<div class="logo-wrap">
		    	<div id="logo_svg"></div>
                <div  id="img_cntr"><svg version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
	 width="840px" height="521px" viewBox="0 0 839.381 520.478" enable-background="new 0 0 839.381 520.478"
	 xml:space="preserve">
     <filter id="dropshadow" height="130%">
      <feGaussianBlur in="SourceAlpha" stdDeviation="4"/> <!-- stdDeviation is how much to blur -->
	  
      <feOffset dx="2" dy="2" result="offsetblur"/> <!-- how much to offset -->
	 
	   <feFlood flood-color="black" flood-opacity="0.8">
	    <animate id="gray-filter-anim-in"  attributeName="flood-opacity" attributeType="XML" dur="10s" from="0.8" to="0.5"  fill="freeze"/>
	   
	   </feFlood>
	  
	  <feComposite in2="offsetblur" operator="in"/>
      <feMerge> 
        <feMergeNode/> <!-- this contains the offset blurred image -->
        <feMergeNode in="SourceGraphic"/> <!-- this contains the element that the filter is applied to -->
      </feMerge>
    </filter>

    <filter id="logo-shadow" x="" y="" width="300%" height="300%" color-interpolation-filters="sRGB">
        <feOffset result="offOut" in="SourceGraphic" dx="0" dy=""></feOffset>
        <feGaussianBlur result="blurOut" in="offOut" stdDeviation="6"></feGaussianBlur>
        <feComponentTransfer>
          <feFuncA type="linear" slope="0.9"></feFuncA>
        </feComponentTransfer>
      </filter>
     
     
     
     
     
<g id="O-circle">
	<path fill="#3BB54A" d="M624.029,110.055c32.739,0,63.519,12.749,86.669,35.9c23.15,23.15,35.9,53.93,35.9,86.669
		s-12.749,63.519-35.9,86.669c-23.15,23.15-53.93,35.9-86.669,35.9s-63.519-12.749-86.669-35.9c-23.15-23.15-35.9-53.93-35.9-86.669
		s12.749-63.519,35.9-86.669C560.51,122.804,591.29,110.055,624.029,110.055 M624.029,78.055
		c-85.366,0-154.569,69.203-154.569,154.569s69.203,154.569,154.569,154.569s154.569-69.203,154.569-154.569
		S709.395,78.055,624.029,78.055L624.029,78.055z"/>
</g>
<g id="shop-text" >
	<path fill="#414042" d="M569.926,239.33c0,1.703-0.247,3.216-0.739,4.538c-0.493,1.323-1.166,2.471-2.017,3.445
		c-0.853,0.975-1.86,1.793-3.025,2.454c-1.166,0.661-2.415,1.193-3.748,1.597c-1.334,0.403-2.729,0.694-4.185,0.874
		c-1.457,0.179-2.902,0.269-4.337,0.269c-1.927,0-3.63-0.123-5.109-0.37s-2.891-0.644-4.235-1.193s-2.684-1.26-4.017-2.134
		s-2.818-1.938-4.453-3.193l6.621-5.412c0.605,1.143,1.406,2.18,2.403,3.109c0.997,0.93,2.034,1.731,3.109,2.404
		c1.076,0.672,2.118,1.188,3.126,1.546c1.009,0.359,1.826,0.538,2.454,0.538c0.516,0,1.098-0.017,1.748-0.051
		c0.649-0.033,1.311-0.101,1.983-0.202s1.333-0.252,1.983-0.454c0.649-0.202,1.227-0.476,1.73-0.824
		c0.504-0.347,0.907-0.784,1.21-1.311s0.454-1.16,0.454-1.899c0-0.762-0.196-1.429-0.588-2c-0.393-0.571-0.902-1.07-1.53-1.496
		c-0.627-0.426-1.344-0.784-2.15-1.076c-0.808-0.291-1.62-0.549-2.438-0.773s-1.608-0.42-2.37-0.588s-1.423-0.331-1.982-0.487
		c-1.031-0.291-2.118-0.588-3.261-0.891c-1.143-0.302-2.274-0.649-3.396-1.042c-1.12-0.392-2.19-0.857-3.21-1.395
		c-1.02-0.538-1.916-1.182-2.688-1.933c-0.773-0.75-1.39-1.635-1.849-2.655c-0.46-1.02-0.689-2.213-0.689-3.58
		c0-2.509,0.498-4.61,1.496-6.302c0.996-1.692,2.313-3.047,3.949-4.067s3.496-1.742,5.58-2.168s4.201-0.639,6.353-0.639
		c1.479,0,3.036,0.151,4.673,0.454c1.635,0.303,3.227,0.751,4.772,1.345c1.547,0.594,2.992,1.316,4.337,2.168
		c1.344,0.852,2.465,1.827,3.361,2.924l-6.622,5.445c-0.493-1.344-1.138-2.499-1.933-3.462c-0.796-0.963-1.659-1.753-2.589-2.37
		c-0.93-0.616-1.882-1.07-2.856-1.361c-0.976-0.291-1.878-0.437-2.706-0.437c-0.807,0-1.715,0.034-2.723,0.101
		c-1.009,0.067-1.956,0.258-2.841,0.571c-0.886,0.314-1.636,0.79-2.252,1.429s-0.925,1.519-0.925,2.639
		c0,0.807,0.186,1.496,0.555,2.067c0.37,0.571,0.857,1.064,1.463,1.479c0.604,0.415,1.294,0.762,2.067,1.042
		c0.772,0.28,1.563,0.526,2.369,0.739c0.807,0.213,1.591,0.398,2.354,0.555c0.761,0.157,1.445,0.325,2.05,0.504
		c1.03,0.292,2.123,0.588,3.277,0.891c1.154,0.302,2.291,0.65,3.412,1.042c1.12,0.392,2.201,0.852,3.243,1.378
		c1.042,0.527,1.955,1.171,2.74,1.933c0.784,0.762,1.411,1.653,1.882,2.672C569.69,236.736,569.926,237.94,569.926,239.33z"/>
	<path fill="#414042" d="M616.783,229.481c0,2.622-0.319,5.356-0.958,8.202c-0.639,2.846-1.53,5.636-2.673,8.37
		c-1.143,2.734-2.51,5.306-4.101,7.714c-1.592,2.409-3.34,4.488-5.244,6.235l-4.269-2.319c0.605-1.12,1.177-2.375,1.714-3.764
		c0.538-1.39,1.025-2.863,1.463-4.42c0.437-1.557,0.828-3.165,1.176-4.824c0.348-1.658,0.639-3.299,0.874-4.924
		c0.235-1.625,0.415-3.204,0.538-4.739c0.123-1.535,0.185-2.963,0.185-4.286c0-0.874-0.033-1.81-0.101-2.807
		c-0.067-0.997-0.207-1.994-0.42-2.991s-0.499-1.955-0.857-2.874c-0.358-0.918-0.835-1.726-1.429-2.42s-1.311-1.254-2.151-1.681
		c-0.84-0.425-1.832-0.639-2.975-0.639c-1.121,0-2.117,0.252-2.991,0.756s-1.647,1.166-2.319,1.983
		c-0.673,0.818-1.25,1.753-1.731,2.807c-0.482,1.054-0.874,2.134-1.177,3.244c-0.302,1.109-0.521,2.202-0.655,3.277
		c-0.134,1.076-0.201,2.04-0.201,2.891v19.462h-11.396v-53.109h11.361v20c1.457-2.128,3.244-3.77,5.361-4.924
		c2.118-1.154,4.465-1.731,7.042-1.731c2.689,0,5.031,0.437,7.025,1.311c1.994,0.874,3.652,2.09,4.975,3.647
		s2.309,3.406,2.958,5.546C616.458,224.613,616.783,226.949,616.783,229.481z"/>
	<path fill="#414042" d="M665.287,232.237c0,2.017-0.269,3.911-0.807,5.681c-0.538,1.771-1.283,3.406-2.235,4.907
		c-0.953,1.501-2.101,2.852-3.445,4.051s-2.818,2.213-4.42,3.042c-1.603,0.829-3.317,1.468-5.144,1.916
		c-1.826,0.448-3.703,0.672-5.63,0.672c-1.928,0-3.799-0.224-5.613-0.672c-1.815-0.448-3.524-1.087-5.126-1.916
		c-1.603-0.829-3.076-1.843-4.421-3.042c-1.344-1.199-2.493-2.549-3.445-4.051c-0.952-1.501-1.697-3.143-2.235-4.924
		c-0.537-1.781-0.807-3.669-0.807-5.664c0-1.994,0.27-3.882,0.807-5.664c0.538-1.782,1.283-3.423,2.235-4.924
		c0.952-1.501,2.102-2.852,3.445-4.051c1.345-1.198,2.818-2.212,4.421-3.042c1.602-0.829,3.311-1.467,5.126-1.916
		c1.814-0.448,3.686-0.672,5.613-0.672s3.804,0.224,5.63,0.672c1.826,0.449,3.541,1.087,5.144,1.916
		c1.602,0.83,3.075,1.844,4.42,3.042c1.345,1.199,2.492,2.55,3.445,4.051c0.952,1.501,1.697,3.143,2.235,4.924
		C665.019,228.354,665.287,230.243,665.287,232.237z M653.724,232.237c0-1.075-0.062-2.212-0.185-3.412
		c-0.123-1.198-0.331-2.375-0.622-3.529s-0.688-2.263-1.193-3.328c-0.504-1.064-1.126-1.994-1.865-2.79
		c-0.739-0.795-1.625-1.434-2.655-1.916c-1.031-0.481-2.23-0.723-3.597-0.723c-1.3,0-2.454,0.247-3.462,0.739
		c-1.009,0.493-1.889,1.149-2.639,1.967c-0.751,0.818-1.379,1.765-1.883,2.84s-0.913,2.19-1.227,3.344
		c-0.314,1.155-0.538,2.319-0.673,3.496c-0.134,1.176-0.201,2.28-0.201,3.311s0.067,2.135,0.201,3.311
		c0.135,1.177,0.358,2.348,0.673,3.513c0.313,1.166,0.723,2.281,1.227,3.345c0.504,1.064,1.132,2.006,1.883,2.823
		c0.75,0.818,1.63,1.474,2.639,1.967c1.008,0.493,2.162,0.739,3.462,0.739c1.345,0,2.532-0.241,3.563-0.723
		c1.031-0.481,1.922-1.126,2.673-1.933c0.75-0.807,1.372-1.736,1.865-2.79c0.493-1.053,0.891-2.163,1.193-3.328
		s0.516-2.342,0.639-3.53C653.662,234.444,653.724,233.313,653.724,232.237z"/>
	<path fill="#414042" d="M713.724,232.237c0,2.824-0.426,5.468-1.277,7.933c-0.852,2.465-2.084,4.611-3.697,6.437
		c-1.613,1.827-3.586,3.266-5.916,4.319c-2.331,1.053-4.975,1.58-7.933,1.58c-2.264,0-4.342-0.442-6.235-1.328
		c-1.894-0.885-3.513-2.246-4.857-4.084v22.555h-11.361v-56.74h4.37l5.042,8.437c0.492-1.412,1.171-2.694,2.033-3.849
		c0.862-1.154,1.86-2.14,2.992-2.958c1.131-0.818,2.375-1.451,3.73-1.899c1.356-0.448,2.784-0.672,4.286-0.672
		c2.958,0,5.602,0.527,7.933,1.58c2.33,1.054,4.303,2.493,5.916,4.319c1.613,1.827,2.846,3.972,3.697,6.437
		C713.298,226.77,713.724,229.414,713.724,232.237z M702.194,232.237c0-0.985-0.05-2.033-0.151-3.143
		c-0.101-1.109-0.274-2.213-0.521-3.311s-0.589-2.151-1.025-3.16s-0.991-1.899-1.664-2.672c-0.672-0.773-1.484-1.389-2.437-1.849
		c-0.953-0.459-2.057-0.689-3.312-0.689c-1.3,0-2.426,0.224-3.378,0.672c-0.953,0.448-1.771,1.059-2.454,1.832
		c-0.684,0.773-1.243,1.659-1.681,2.656c-0.437,0.997-0.778,2.045-1.024,3.143c-0.247,1.099-0.421,2.208-0.521,3.328
		s-0.151,2.185-0.151,3.193c0,0.897,0.067,1.888,0.202,2.975c0.134,1.087,0.347,2.18,0.639,3.277
		c0.291,1.098,0.672,2.163,1.143,3.193s1.047,1.949,1.731,2.756c0.683,0.807,1.479,1.451,2.386,1.933
		c0.908,0.482,1.944,0.723,3.109,0.723c1.277,0,2.387-0.229,3.328-0.689c0.941-0.459,1.748-1.076,2.42-1.849
		c0.673-0.773,1.228-1.664,1.664-2.672s0.778-2.062,1.025-3.16c0.246-1.098,0.42-2.207,0.521-3.328
		C702.145,234.276,702.194,233.224,702.194,232.237z"/>
</g>
<g id="nepal-text">
	<path fill="#414042" d="M487.073,432.272c0,5.758-0.701,11.762-2.104,18.011c-1.402,6.25-3.358,12.376-5.868,18.379
		c-2.51,6.005-5.512,11.651-9.005,16.94c-3.495,5.289-7.333,9.854-11.515,13.692l-9.374-5.094c1.328-2.461,2.583-5.216,3.764-8.267
		c1.182-3.052,2.252-6.285,3.211-9.706c0.96-3.42,1.82-6.95,2.584-10.593c0.762-3.641,1.402-7.245,1.919-10.813
		c0.517-3.567,0.91-7.036,1.181-10.407c0.271-3.37,0.406-6.507,0.406-9.411c0-1.919-0.074-3.974-0.222-6.163
		s-0.455-4.38-0.923-6.569s-1.096-4.293-1.882-6.312c-0.788-2.017-1.834-3.788-3.137-5.314c-1.305-1.524-2.879-2.755-4.725-3.69
		c-1.845-0.935-4.022-1.402-6.532-1.402c-2.461,0-4.65,0.554-6.569,1.66c-1.919,1.107-3.617,2.56-5.093,4.355
		c-1.477,1.797-2.744,3.851-3.802,6.163c-1.059,2.313-1.919,4.688-2.583,7.123s-1.145,4.835-1.439,7.197
		c-0.295,2.361-0.443,4.478-0.443,6.348v42.737H399.9v-85.254h9.596l11.441,19.855c1.377-3.296,3.1-6.298,5.167-9.005
		c2.066-2.705,4.403-5.02,7.012-6.938c2.607-1.919,5.499-3.396,8.673-4.429s6.606-1.55,10.297-1.55
		c5.905,0,11.047,0.96,15.427,2.879s8.021,4.589,10.925,8.009c2.902,3.42,5.067,7.48,6.495,12.179
		C486.359,421.583,487.073,426.712,487.073,432.272z"/>
	<path fill="#414042" d="M585.539,423.858c0,3.494-0.566,6.606-1.697,9.337c-1.133,2.731-2.67,5.13-4.613,7.197
		c-1.944,2.066-4.196,3.813-6.754,5.24c-2.56,1.428-5.29,2.596-8.193,3.506c-2.904,0.911-5.894,1.563-8.968,1.956
		c-3.076,0.395-6.065,0.591-8.969,0.591c-3.69,0-7.333-0.259-10.924-0.775c-3.593-0.517-7.136-1.34-10.629-2.473
		c0.54,3.248,1.402,6.337,2.583,9.264c1.181,2.929,2.755,5.487,4.724,7.677c1.968,2.19,4.393,3.925,7.271,5.203
		c2.879,1.28,6.286,1.92,10.224,1.92c2.607,0,5.093-0.394,7.455-1.182c2.362-0.786,4.526-1.894,6.495-3.321
		c1.968-1.427,3.702-3.124,5.204-5.093c1.5-1.968,2.719-4.158,3.653-6.569l10.777,3.985c-1.624,3.888-3.852,7.247-6.681,10.076
		c-2.83,2.83-6.028,5.166-9.596,7.012s-7.356,3.211-11.367,4.097s-7.984,1.328-11.92,1.328c-6.496,0-12.5-1.096-18.011-3.284
		c-5.512-2.189-10.26-5.252-14.246-9.189c-3.985-3.937-7.111-8.637-9.374-14.099c-2.264-5.462-3.396-11.44-3.396-17.937
		c0-6.495,1.132-12.475,3.396-17.937c2.263-5.462,5.389-10.16,9.374-14.098c3.986-3.937,8.734-7,14.246-9.19
		c5.511-2.188,11.515-3.284,18.011-3.284c3.148,0,6.372,0.222,9.669,0.664c3.296,0.443,6.495,1.145,9.596,2.104
		c3.101,0.96,6.027,2.203,8.784,3.728c2.755,1.526,5.153,3.408,7.196,5.647c2.041,2.239,3.665,4.834,4.872,7.787
		C584.937,416.698,585.539,420.069,585.539,423.858z M524.054,440.687c3.05,0.689,6.101,1.23,9.152,1.624
		c3.051,0.395,6.127,0.59,9.227,0.59c3.248,0,6.262-0.307,9.042-0.922c2.779-0.615,5.191-1.648,7.233-3.101
		c2.042-1.451,3.654-3.383,4.835-5.794c1.182-2.411,1.771-5.413,1.771-9.006c0-2.902-0.395-5.56-1.181-7.972
		c-0.788-2.41-1.956-4.477-3.506-6.2c-1.551-1.722-3.458-3.063-5.721-4.022c-2.264-0.96-4.897-1.439-7.898-1.439
		c-2.805,0-5.327,0.517-7.565,1.55c-2.239,1.034-4.207,2.425-5.905,4.171c-1.697,1.747-3.149,3.777-4.354,6.09
		c-1.206,2.313-2.203,4.724-2.989,7.233c-0.788,2.51-1.354,5.045-1.698,7.603c-0.345,2.56-0.517,4.971-0.517,7.233
		c0,0.395,0,0.788,0,1.182S524.004,440.293,524.054,440.687z"/>
	<path fill="#414042" d="M691.756,438.325c0,6.2-0.936,12.008-2.806,17.42c-1.87,5.414-4.576,10.125-8.119,14.135
		c-3.543,4.012-7.873,7.173-12.991,9.485s-10.924,3.469-17.419,3.469c-4.972,0-9.535-0.972-13.692-2.915
		c-4.159-1.943-7.714-4.933-10.666-8.969v49.528h-24.949V395.882h9.596l11.072,18.527c1.082-3.101,2.57-5.917,4.466-8.451
		c1.894-2.534,4.084-4.699,6.569-6.496c2.484-1.796,5.215-3.186,8.193-4.17c2.977-0.984,6.113-1.477,9.411-1.477
		c6.495,0,12.301,1.157,17.419,3.469c5.118,2.314,9.448,5.476,12.991,9.485c3.543,4.012,6.249,8.723,8.119,14.135
		C690.82,426.319,691.756,432.125,691.756,438.325z M666.438,438.325c0-2.165-0.11-4.466-0.332-6.901s-0.603-4.858-1.144-7.271
		c-0.542-2.41-1.292-4.724-2.252-6.938c-0.959-2.214-2.177-4.17-3.653-5.868c-1.477-1.697-3.261-3.051-5.352-4.06
		c-2.092-1.008-4.516-1.513-7.271-1.513c-2.854,0-5.327,0.492-7.418,1.476c-2.093,0.985-3.888,2.325-5.389,4.023
		c-1.501,1.697-2.73,3.642-3.69,5.831s-1.71,4.491-2.251,6.901c-0.542,2.411-0.923,4.848-1.145,7.308
		c-0.222,2.461-0.332,4.798-0.332,7.012c0,1.969,0.147,4.146,0.442,6.532c0.296,2.388,0.763,4.787,1.403,7.197
		c0.639,2.411,1.476,4.749,2.509,7.012c1.034,2.265,2.3,4.281,3.802,6.053c1.5,1.771,3.248,3.187,5.24,4.244
		c1.993,1.059,4.269,1.587,6.828,1.587c2.805,0,5.24-0.504,7.308-1.513c2.066-1.008,3.838-2.362,5.314-4.06
		c1.477-1.698,2.694-3.654,3.653-5.868c0.96-2.215,1.71-4.527,2.252-6.938c0.541-2.41,0.922-4.847,1.144-7.308
		C666.327,442.803,666.438,440.491,666.438,438.325z"/>
	<path fill="#414042" d="M793.617,481.136h-24.949V470.95c-2.952,4.036-6.508,7.025-10.666,8.969s-8.723,2.915-13.691,2.915
		c-6.496,0-12.303-1.156-17.42-3.469c-5.119-2.313-9.448-5.474-12.991-9.485c-3.543-4.01-6.25-8.721-8.119-14.135
		c-1.871-5.412-2.806-11.22-2.806-17.42s0.935-12.006,2.806-17.42c1.869-5.412,4.576-10.123,8.119-14.135
		c3.543-4.01,7.872-7.171,12.991-9.485c5.117-2.312,10.924-3.469,17.42-3.469c3.296,0,6.433,0.492,9.41,1.477
		s5.708,2.374,8.193,4.17c2.484,1.797,4.675,3.962,6.569,6.496s3.383,5.351,4.466,8.451l11.072-18.527h9.596V481.136z
		 M768.521,438.325c0-2.214-0.11-4.551-0.332-7.012c-0.222-2.46-0.604-4.896-1.145-7.308c-0.542-2.41-1.291-4.712-2.251-6.901
		c-0.959-2.189-2.19-4.134-3.69-5.831c-1.502-1.698-3.311-3.038-5.426-4.023c-2.116-0.983-4.576-1.476-7.381-1.476
		s-5.24,0.505-7.308,1.513c-2.066,1.009-3.838,2.362-5.314,4.06c-1.477,1.698-2.694,3.654-3.653,5.868
		c-0.96,2.215-1.711,4.528-2.252,6.938c-0.542,2.412-0.922,4.835-1.144,7.271s-0.332,4.736-0.332,6.901
		c0,2.166,0.11,4.479,0.332,6.938c0.222,2.461,0.602,4.897,1.144,7.308c0.541,2.411,1.292,4.724,2.252,6.938
		c0.959,2.214,2.177,4.17,3.653,5.868c1.477,1.697,3.248,3.052,5.314,4.06c2.067,1.009,4.503,1.513,7.308,1.513
		c2.559,0,4.835-0.528,6.828-1.587c1.992-1.058,3.738-2.473,5.24-4.244c1.501-1.771,2.768-3.788,3.802-6.053
		c1.033-2.263,1.869-4.601,2.509-7.012c0.64-2.41,1.107-4.81,1.403-7.197C768.373,442.471,768.521,440.293,768.521,438.325z"/>
	<path fill="#414042" d="M839.381,481.136h-24.949V356.615h9.596l15.354,25.908v98.613H839.381z"/>
</g>
<path id="g-letter" fill="#ED1C24" d="M276.646,256.167c44.277,64.957,70.167,141.826-51.822,141.827
	c-96.576,0.001-174.866-78.516-174.866-175.369s78.29-175.368,174.866-175.368c74.678,0,138.41,46.951,163.478,113.019l49.227-8.079
	C407.351,63.674,323.49,0.001,224.752,0.001C100.625,0.001,0,100.626,0,224.753s100.625,224.752,224.752,224.752
	c105.168,0,193.454-72.238,217.973-169.799L276.646,256.167z"/>
</svg>
                    </div>
                
                
                
		    </div>
 </div>           
<section class="landing">  
  <div class="container">
    <h1 class="page-title"><img src="<?php echo get_template_directory_uri();?>/assets/images/gsn-ob.svg" width="200px"></h1>
    <!-- LOGIN and REGISTER Form -->
    <div class="landing__form">      
      <!-- TAB NAV -->
      <div class="landing__nav">
        <ul id="landing__tab" class="nav nav-tabs clearfix landing__tab" role="tablist">
          <li class="active" role="presentation">
            <a href="#login" role="tab" data-toggle="tab">Login</a>
          </li>
          <li role="presentation">
            <a href="#register" role="tab" data-toggle="tab">Register</a>
          </li>
        </ul>
      </div>
      <!-- TAB NAV End -->
      <!-- TAB CONTENT -->
      <div class="landing__tab-content tab-content clearfix">
        <!-- Login Form -->
        <div id="login" class="tab-pane active tab-content__login" role="tabpanel">
          <form name="login_form" id="login_form">
            <!-- Row start -->
            <div class="form-group">
              <label for="loginEmailAddress" class="form-label">Email Address</label>
              <div class="form-input">
                <input type="text" class="form-control" name="loginEmailAddress" id="loginEmailAddress" placeholder="Enter your email address">
              </div>
            </div>
            <!-- Row end -->            
            <!-- Row start -->
            <div class="form-group">
              <label for="login_password" class="form-label" type="password">Password</label>
              <div class="form-input">
                <input type="text" class="form-control" name="loginPassword" id="loginPassword" placeholder="Enter your password">
              </div>
            </div>
            <!-- Row end -->
            <button type="submit" class="btn btn-submit">Login</button>
          </form>
        </div>
        <!-- Login Form End -->
        <!-- Register Form -->
        <div id="register" class="tab-pane tab-content__register" role="tabpanel">
          <form name="register_form" id="register_form">
		  	<div class="row">
            <!-- Row start -->
            <div class="form-group col-sm-6">
              <label for="firstName" class="form-label">First Name</label>
              <div class="form-input">
                <input type="text" class="form-control" name="firstName" id="firstName" placeholder="Enter your first name">
              </div>
            </div>
            <!-- Row end -->
            <!-- Row start -->
            <div class="form-group col-sm-6">
              <label for="lastName" class="form-label">Last Name</label>
              <div class="form-input">
                <input type="text" class="form-control"  name="lastName"  id="lastName"  placeholder="Enter your last name">
              </div>
            </div>
            <!-- Row end -->
            <!-- Row start -->
            <div class="form-group col-sm-12">
              <label for="emailAddress" class="form-label">Email Address</label>
              <div class="form-input">
                <input type="text" class="form-control" name="emailAddress" id="emailAddress" placeholder="Enter your email address">
              </div>
            </div>
            <!-- Row end -->
            
            <!-- Row start -->
            <div class="form-group col-sm-6">
              <label for="password" class="form-label">Password</label>
              <div class="form-input">
                <input type="password" class="form-control" name="password" id="password" placeholder="Enter your password">
              </div>
            </div>
            <!-- Row end -->

            <!-- Row start -->
            <div class="form-group col-sm-6">
              <label for="cpassword" class="form-label">Confirm Password</label>
              <div class="form-input">
                <input type="password" class="form-control" name="cpassword" id="cpassword" placeholder="Confirm your password">
              </div>
            </div>
            <!-- Row end -->

            <!-- Row start -->
            <div class="form-group col-sm-6">
              <label for="mobileNumber" class="form-label">Mobile Number</label>
              <div class="form-input">
                <input type="text" class="form-control" name="mobileNumber" id="mobileNumber" placeholder="Enter your mobile number">
              </div>
            </div>
            <!-- Row end -->
			

            <!-- Row start -->
            <div class="form-group col-sm-6">
              <label for="storeName" class="form-label">Store Name</label>
              <div class="form-input">
                <input type="text" class="form-control" name="storeName" id="storeName" placeholder="Enter your store name">
              </div>
            </div>
            <!-- Row end -->

            <!-- Row start -->
            <div class="form-group col-sm-6">
              <label for="panNumber" class="form-label">Pan Number</label>
              <div class="form-input">
                <input type="text" class="form-control" name="panNumber"  id="panNumber" placeholder="Enter your pan number">
              </div>
            </div>
            <!-- Row end -->
			<!-- Row start -->
			<div class="bd-example bd-example-padded-bottom col-sm-6 location_cntr">
			<label for="location" class="form-label">Set Your Store Location</label>
				<button type="button" class="btn btn-primary col-sm-12 brick_red" id="set_location_btn" data-toggle="modal" data-target="#gridSystemModal"> Location </button>
                <button type="button" style="display:none" class="btn btn-success col-sm-12"  id="change_location_btn"data-toggle="modal" data-target="#gridSystemModal">
                	<span>Your location</span>
                    <p class="btn_location_text"></p>
                </button>
			</div>
			<!-- Row end -->
			</div>
            <!-- Row start -->
			
			<div id="gridSystemModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="gridModalLabel" aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
						<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						<h4 class="modal-title" id="gridModalLabel">Find Your Store Location</h4>
						</div>
						<div class="modal-body">
						<div class="form-group clearfix">
						  
						  <div class="form-input">
						   <input id="pac-input" class="controls" type="text" placeholder="Search Box">
						   <div id="map" style="width:100%;height:400px"></div>
							 Selected Location :<span id="selected_location_label"></span>
							<input type="hidden" class="form-control" name="storeFullAddress" id="storeFullAddress">
							<input type="hidden" class="form-control" name="latitute" id="latitute">
							<input type="hidden" class="form-control" name="lognitute" id="lognitute">                  
						  </div>
                          
						</div>
						</div>
						<div class="modal-footer">
                        
						<button type="button" class="btn btn-primary btn-set-location" >Set location</button>
						</div>
					</div>
				</div>
			</div>
            <!-- Row end -->
            <button type="submit" class="btn btn-submit">Register</button>
          </form>
        </div>
        <!-- Register Form End -->
      </div>
      <!-- TAB CONTENT End -->
    </div>
    <!-- LOGIN and REGISTER Form End -->   
  </div> 
</section>
<!-- LANDING FORM End -->

<?php get_footer(); ?>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCcldtJlaZ2nGXLR7OnH36zzZs1UEREDTU&libraries=places"></script>
<script>
/*
* event trigger when set location click
*/
jQuery('.btn-set-location').on('click',function(){
	var location_selected=jQuery('#storeFullAddress').val().trim();
	if(location_selected==""){
		if(!jQuery('.alert.alert-danger').length){
			jQuery(this).parent().prepend('<span class="alert alert-danger alert-dismissible"> Please select location</span>');
		}
			}else{
				jQuery('#set_location_btn').hide();
				jQuery('#change_location_btn').show();
				jQuery(this).parent().find('.alert').remove();
		$('#gridSystemModal').modal('hide');	
	}
});


/* Login jQuery validation Procress */
jQuery("#login_form").validate({
	rules: {
      loginEmailAddress: {
        required: true,
        email: true
      },
      loginPassword: {
        required: true,
      },
    },
	// Specify validation error messages
    messages: {
      password: "Please provide a password",
      emailAddress: "Please enter a valid email address",
    },
  submitHandler: function(form) {
	  var formdata=jQuery(form).serialize();
	  var data= {action: "store_login", formdata : formdata};
	 var response=ajax_call_post(data,'#login_form','',function(response){
		  window.location.href=response.redirectUrl;
		return false;
	 });
	  
  }
	
});





/* Registration jQuery validation process */
jQuery("#register_form").validate({
	 ignore: ['storeFullAddress'],
	// Specify validation rules
    rules: {
      // The key name on the left side is the name attribute
      // of an input field. Validation rules are defined
      // on the right side
      firstName: "required",
      lastName: "required",
      emailAddress: {
        required: true,
        email: true
      },
      password: {
        required: true,
        minlength: 5
      },
	  cpassword :{
		  minlength : 5,
          equalTo : "#password"  
		  
	  },
	  mobileNumber: {
		required: true,
		minlength:9,
		maxlength:10,
		number: true
      },
	  storeName : "required",
	  panNumber : "required",
	  storeFullAddress :  "required"
	
	  
    },
    // Specify validation error messages
    messages: {
      firstname: "Please enter your firstname",
      lastname: "Please enter your lastname",
      password: {
        required: "Please provide a password",
        minlength: "Your password must be at least 5 characters long"
      },
	  cpassword: {
		  equalTo : "Comfirm password and password must be same."
	  },
      email: "Please enter a valid email address",
	  storeLocation : "Please mark your location on map",
    },
	onfocusout: function(element){
		if(jQuery(element).attr('name')==="emailAddress"){
			 if(jQuery(element).valid()){
				 check_email_exists(jQuery(element).val());
			 }
		}
	},
	
  submitHandler: function(form) {
	  var formdata=jQuery(form).serialize();
	  var data= {action: "store_registration", formdata : formdata};
	 var response=ajax_call_post(data,'#register_form','',function(response){
		 window.location.href=response.redirectUrl;
		 return false;
		 
	 });
  }
 });
 
 function check_email_exists(email){
	 var data= {action: "email_is_exists", email : email};
	 var response=ajax_call_post(data,'.btn-primary','after',function(response){
		 console.log(response);
	 });	 
 }

 jQuery('#landing__tab a').on('click', function(e) {
  e.preventDefault();
  $(this).tab('show');
 });

</script>