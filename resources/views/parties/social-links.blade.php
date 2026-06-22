<ul class="social-link">
  @if(!empty($settings['facebook_url']))
    <li><a href="{{ $settings['facebook_url'] }}" target="_blank" rel="noopener"><i class="fab fa-facebook-f"></i></a></li>
  @endif
  @if(!empty($settings['twitter_url']))
    <li><a href="{{ $settings['twitter_url'] }}" target="_blank" rel="noopener"><i class="fab fa-twitter"></i></a></li>
  @endif
  @if(!empty($settings['linkedin_url']))
    <li><a href="{{ $settings['linkedin_url'] }}" target="_blank" rel="noopener"><i class="fab fa-linkedin"></i></a></li>
  @endif
  @if(!empty($settings['youtube_url']))
    <li><a href="{{ $settings['youtube_url'] }}" target="_blank" rel="noopener"><i class="fab fa-youtube"></i></a></li>
  @endif
</ul>
