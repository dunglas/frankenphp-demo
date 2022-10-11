import http from 'k6/http';
import { check, sleep } from 'k6';
import { htmlReport } from "https://raw.githubusercontent.com/benc-uk/k6-reporter/main/dist/bundle.js";

export default function () {
  const res = http.get('https://localhost');
  check(res, {
  'is status 200': (r) => r.status === 200,
  'verify homepage text': (r) =>
      r.body.includes('Hey'),
  'protocol is HTTP/2': (r) => r.proto === 'HTTP/2.0',
  });
  sleep(1);
}

export function handleSummary(data) {
  return {
    "summary.html": htmlReport(data),
  };
}

