<?php

emailClients(['jjrb6@hotmail.com', 'jreyes@joonik.com']);

# Bad.
function emailClient(array $clients): bool
{
    foreach ($clients as $client) {
        $clientRecord = $db->find($client);
        if ($clientRecord->isActive()) {
            email($client);
        }
    }

    return true;
}


# Good.

/**
 * @param array $clients
 */
function emailClients(array $clients): void
{
    $activeClients = activeClients($clients);
    array_walk($activeClients, 'email');
}

function activeClients(array $clients): array
{
    return array_filter($clients, 'isClientActive');
}

function isClientActive(int $client): bool
{
    $clientRecord = $db->find($client);

    return $clientRecord->isActive();
}