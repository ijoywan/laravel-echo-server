package subscribers

import (
	"github.com/ijoywan/laravel-echo-server-4-golang/types"
)

type Broadcast func(string, *types.Data)

type Subscriber interface {
	// Subscribe to incoming events.
	Subscribe(Broadcast)

	// Unsubscribe from events to broadcast.
	UnSubscribe()
}
