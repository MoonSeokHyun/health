<style>
  .site-footer {
    margin-top: 40px;
    border-top: 1px solid var(--line);
    background: #fff;
  }

  .footer-inner {
    max-width: var(--max);
    margin: 0 auto;
    padding: 24px 18px 16px;
    display: grid;
    gap: 14px;
    grid-template-columns: 1.2fr 1fr 1fr;
  }

  .footer-title {
    font-size: 13px;
    color: var(--ink);
    font-weight: 800;
    margin-bottom: 6px;
  }

  .footer-inner p,
  .footer-inner li,
  .footer-inner a {
    font-size: 12px;
    color: var(--ink3);
    line-height: 1.7;
  }

  .footer-inner ul { list-style: none; }

  .copyright {
    max-width: var(--max);
    margin: 0 auto;
    padding: 0 18px 18px;
    font-size: 11px;
    color: var(--ink4);
  }

  @media (max-width: 860px) {
    .footer-inner { grid-template-columns: 1fr; }
  }
</style>

<footer class="site-footer">
  <div class="footer-inner">
    <section>
      <h2 class="footer-title">HealthCare</h2>
      <p>전국 의료 서비스 공공데이터 기반 정보 제공</p>
      <p>사업자 등록번호: 345-18-02361</p>
    </section>
    <section>
      <h2 class="footer-title">고객센터</h2>
      <p>이메일: <a href="mailto:gjqmaoslwj@naver.com">gjqmaoslwj@naver.com</a></p>
      <p>운영시간: 평일 09:00 ~ 18:00</p>
      <p>정보 수정/삭제 요청 및 이용 문의 가능</p>
    </section>
    <section>
      <h2 class="footer-title">바로가기</h2>
      <ul>
        <li><a href="<?= site_url('/') ?>">홈</a></li>
        <li><a href="<?= site_url('hospitals') ?>">병원 목록</a></li>
        <li><a href="<?= site_url('clinics') ?>">의원 목록</a></li>
        <li><a href="<?= site_url('pharmacies') ?>">약국 목록</a></li>
      </ul>
    </section>
  </div>
  <p class="copyright">© 2026 MoonDilogistics. All rights reserved.</p>
</footer>

<script type="text/javascript" src="//wcs.pstatic.net/wcslog.js"></script>
<script type="text/javascript">
if(!wcs_add) var wcs_add = {};
wcs_add["wa"] = "9b158284b08188";
if(window.wcs) {
  wcs_do();
}
</script>
</body>
</html>
