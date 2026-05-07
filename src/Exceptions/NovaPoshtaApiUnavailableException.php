<?php

namespace Sashalenz\NovaPoshtaApi\Exceptions;

/**
 * Thrown when the NP endpoint is reachable but the API itself is not
 * answering — connection reset, timeout, DNS failure, 5xx response.
 *
 * Distinct from the generic `NovaPoshtaException` (which signals an
 * application-level error returned in the API response payload) so
 * consumers and error trackers can group "NP is down" separately from
 * "this particular request was rejected".
 */
class NovaPoshtaApiUnavailableException extends NovaPoshtaException
{
}
